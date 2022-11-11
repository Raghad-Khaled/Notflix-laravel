<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use App\Models\Actor;
use App\Models\ActorPrizeMovie;
use App\Models\ActorPrizeSerie;
use App\Models\Advertisement;
use App\Services\HasMedia;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actors = Actor::paginate(10);
        return view('actor.index', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Actor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActorRequest $request)
    {
        $imageName = HasMedia::upload($request->file('image'), public_path('images\actors'));
        $data = $request->except('_token', 'image');
        $data['image'] = $imageName;
        Actor::create($data);
        return redirect()->route('actors')->with('success', 'Actor Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actor = Actor::findOrFail($id);
        $advertisement = Advertisement::all()->random(1)->first();
        $prizesmovies = ActorPrizeMovie::where('actor_id', $id)
            ->join('prizes', 'prizes.id', '=', 'actor_prize_movies.prize_id')
            ->join('movies', 'movies.id', '=', 'actor_prize_movies.movie_id')
            ->select(['movies.id','movies.name', 'prizes.title', 'prizes.type', 'actor_prize_movies.year'])->get();

        $prizesseries = ActorPrizeSerie::where('actor_id', $id)
            ->join('prizes', 'prizes.id', '=', 'actor_prize_series.prize_id')
            ->join('series', 'series.id', '=', 'actor_prize_series.serie_id')
            ->select(['series.id','series.name', 'prizes.title', 'prizes.type', 'actor_prize_series.year'])->get();
        return view('actor.show', compact('actor', 'advertisement', 'prizesmovies','prizesseries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actor = Actor::findOrFail($id);
        return view('actor.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActorRequest $request, $id)
    {
        $data = $request->except('_token', 'image', '_method');
        $actor = Actor::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = HasMedia::upload($request->file('image'), public_path('images\actors'));
            HasMedia::delete(public_path('images\actors\\' . $actor->image));
            $data['image'] = $imageName;
        }

        $actor->update($data);
        return redirect()->route('actors')->with('success', 'Actor Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actor = Actor::findOrFail($id);
        if (file_exists(public_path('images\actors\\' . $actor->image))) { //delete old image
            unlink(public_path('images\actors\\' . $actor->image));
        }
        $actor->delete();
        return redirect()->route('actors')->with('success', 'Actor Deleted Successfully');
    }
}
