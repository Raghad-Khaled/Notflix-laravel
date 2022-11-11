<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActorPrizeMovieRequest;
use App\Models\Actor;
use App\Models\ActorPrizeMovie;
use App\Models\Movie;
use App\Models\Prize;
use Illuminate\Http\Request;

class ActorPrizeMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prizes = ActorPrizeMovie::join('actors', 'actors.id', '=', 'actor_prize_movies.actor_id')
            ->join('movies', 'movies.id', '=', 'actor_prize_movies.movie_id')
            ->join('prizes', 'prizes.id', '=', 'actor_prize_movies.prize_id')
            ->select([
                'actor_prize_movies.*', 'actors.first_name AS actor_first_name', 'actors.last_name AS actor_last_name',
                'movies.name AS movie', 'prizes.title AS prize_title', 'prizes.type AS prize_type'
        ])->paginate(10);
        return view('actorprizemovie.index', compact('prizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prizes = Prize::get(['id', 'title', 'type']);
        $actors = Actor::get(['id', 'first_name', 'last_name']);
        $movies = Movie::get(['id', 'name']);
        return view('actorprizemovie.create', compact('prizes', 'movies', 'actors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActorPrizeMovieRequest $request)
    {
        $data = $request->except('_token');
        ActorPrizeMovie::create($data);
        return redirect()->route('actorprizemovies')->with('success', 'Prize Created Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($actor_id, $prize_id, $movie_id)
    {
        $prize = ActorPrizeMovie::where('actor_id', $actor_id)->where('prize_id', $prize_id)->where('movie_id', $movie_id);
        $prize->delete();
        return redirect()->route('actorprizemovies')->with('success', 'Prize Deleted Successfully');
    }
}
