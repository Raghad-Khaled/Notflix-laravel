<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Prize;
use App\Models\Serie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Get Destinct Language  
     *
     * @return \Illuminate\Http\Response
     */
    public function movies()
    {
        $languages = Movie::select('language')->groupBy('language')->get();
        $genres = Genre::select('id', 'type')->get();
        $movies = Movie::select('id', 'image', 'description', 'name')->paginate(9);
        $advertisements = Advertisement::all()->random(3);
        return view('home.movies', compact('languages', 'genres',  'movies', 'advertisements'));
    }

    /**
     * Get Destinct Language  
     *
     * @return \Illuminate\Http\Response
     */
    public function series()
    {
        $languages = Serie::select('language')->groupBy('language')->get();
        $genres = Genre::select('id', 'type')->get();
        $series = Serie::select('id', 'image', 'description', 'name')->paginate(9);
        $advertisements = Advertisement::all()->random(3);
        return view('home.series', compact('languages', 'genres',  'series', 'advertisements'));
    }

    public function filtermovies(Request $request)
    {
        $languages = Movie::select('language')->groupBy('language')->get();
        $genres = Genre::select('id', 'type')->get();
        $query = Movie::query();
        if ($request->language)
            $query->where('language', $request->language);
        if ($request->era)
            $query->where('year', 'like', '%' . substr($request->era, 0, 3) . '%');
        if ($request->genre)
            $query->join('genre_movies', 'genre_movies.movie_id', '=', 'movies.id')->where('genre_movies.genre_id', $request->genre);
        $movies = $query->paginate(9);
        $advertisements = Advertisement::all()->random(3);
        return view('home.movies', compact('languages', 'genres',  'movies', 'advertisements'));
    }

    public function filterseries(Request $request)
    {
        $languages = Serie::select('language')->groupBy('language')->get();
        $genres = Genre::select('id', 'type')->get();
        $query = Serie::query();
        if ($request->language)
            $query->where('language', $request->language);
        if ($request->era)
            $query->where('year', 'like', '%' . substr($request->era, 0, 3) . '%');
        if ($request->genre)
            $query->join('genre_series', 'genre_series.serie_id', '=', 'series.id')->where('genre_series.genre_id', $request->genre);
        $series = $query->paginate(9);
        $advertisements = Advertisement::all()->random(3);
        return view('home.series', compact('languages', 'genres', 'series', 'advertisements'));
    }
}
