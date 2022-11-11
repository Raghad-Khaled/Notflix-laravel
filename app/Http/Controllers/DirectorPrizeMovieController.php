<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectorPrizeMovieRequest;
use App\Models\Director;
use App\Models\DirectorPrizeMovie;
use App\Models\Movie;
use App\Models\Prize;
use Illuminate\Http\Request;

class DirectorPrizeMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prizes = DirectorPrizeMovie::join('directors', 'directors.id', '=', 'director_prize_movies.director_id')
            ->join('movies', 'movies.id', '=', 'director_prize_movies.movie_id')
            ->join('prizes', 'prizes.id', '=', 'director_prize_movies.prize_id')
            ->select([
                'director_prize_movies.*', 'directors.first_name AS director_first_name', 'directors.last_name AS director_last_name',
                'movies.name AS movie', 'prizes.title AS prize_title', 'prizes.type AS prize_type'
            ])->paginate(10);
        return view('directorprizemovie.index', compact('prizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prizes = Prize::get(['id','title','type']);
        $directors = Director::get(['id','first_name','last_name']);
        $movies = Movie::get(['id','name']);
        return view('directorprizemovie.create', compact('prizes', 'movies', 'directors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDirectorPrizeMovieRequest $request)
    {
        $data = $request->except('_token');
        DirectorPrizeMovie::create($data);
        return redirect()->route('directorprizemovies')->with('success', 'Prize Created Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($director_id, $prize_id, $movie_id)
    {
        $prize = DirectorPrizeMovie::where('director_id', $director_id)->where('prize_id', $prize_id)->where('movie_id', $movie_id);
        $prize->delete();
        return redirect()->route('directorprizemovies')->with('success', 'Prize Deleted Successfully');
    }
}
