<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStoryRequest;
use App\Http\Requests\UpdateStoryRequest;
use App\Models\Story;
use App\Services\HasMedia;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::paginate(10);
        return view('story.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('story.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoryRequest $request)
    {
        $imageName = HasMedia::upload($request->file('image'), public_path('images\stories'));
        $data = $request->except('_token', 'image');
        $data['image'] = $imageName;
        Story::create($data);
        return redirect()->route('stories')->with('success', 'Story Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::FindOrFail($id);
        return view('story.show', compact('story'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $story = Story::FindOrFail($id);
        return view('story.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoryRequest $request, $id)
    {
        $story = Story::FindOrFail($id);
        $data = $request->except('_method', '_token', 'image');
        if ($request->hasFile('image')) {
            $imageName = HasMedia::upload($request->file('image'), public_path('images\stories'));
            HasMedia::delete(public_path('images\stories\\' . $story->image));
            $data['image'] = $imageName;
        }

        $story->update($data);
        return redirect()->route('stories')->with('success', 'Story Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $story = Story::FindOrFail($id);
        if (file_exists(public_path('images\stories\\' . $story->image))) { //delete old image
            unlink(public_path('images\stories\\' . $story->image));
        }
        $story->delete();
        return redirect()->route('stories')->with('success', 'Story Deleted Successfully');
    }
}
