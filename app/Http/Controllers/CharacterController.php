<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use App\Models\Advertisement;
use App\Models\Character;
use App\Models\Story;
use App\Services\HasMedia;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $characters = Character::join('stories', 'characters.story_id', '=', 'stories.id')
        ->select(['characters.*', 'stories.title'])->paginate(10);
        return view('character.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stories = Story::all();
        return view('character.create', compact('stories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCharacterRequest $request)
    {
        $imageName = HasMedia::upload($request->file('image'), public_path('images\characters'));
        $data = $request->except('_token', 'image');
        $data['image'] = $imageName;
        Character::create($data);
        return redirect()->route('characters')->with('success', 'Character Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $character = Character::findOrFail($id);
        $advertisement = Advertisement::all()->random(1)->first();
        return view('character.show', compact('character', 'advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stories = Story::all();
        $character = Character::findOrFail($id);
        return view('character.edit', compact('character', 'stories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCharacterRequest $request, $id)
    {
        $data = $request->except('_token', 'image', '_method');
        $character = Character::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = HasMedia::upload($request->file('image'), public_path('images\characters'));
            HasMedia::delete(public_path('images\characters\\' . $character->image));
            $data['image'] = $imageName;
        }

        $character->update($data);
        return redirect()->route('characters')->with('success', 'Character Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $character = Character::findOrFail($id);
        if (file_exists(public_path('images\characters\\' . $character->image))) { //delete old image
            unlink(public_path('images\characters\\' . $character->image));
        }
        $character->delete();
        return redirect()->route('characters')->with('success', 'Character Deleted Successfully');
    }
}
