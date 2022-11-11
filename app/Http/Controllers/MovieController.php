<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Actor;
use App\Models\ActorMovie;
use App\Models\Company;
use App\Models\CompanyMovie;
use App\Models\Director;
use App\Models\Genre;
use App\Models\GenreMovie;
use App\Models\Movie;
use App\Models\Story;
use App\Services\HasMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::join('directors', 'directors.id', '=', 'movies.director_id')
            ->leftJoin('stories', 'stories.id', '=', 'movies.story_id')
        ->select(['movies.*', 'directors.first_name', 'directors.last_name', 'stories.title'])->paginate(10);
        return view('movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stories = Story::get(['id', 'title']);
        $directors = Director::get(['id', 'first_name', 'last_name']);
        $companies = Company::get(['id', 'name']);
        $genres = Genre::get(['id', 'type']);
        $actors = Actor::get(['id', 'first_name', 'last_name']);
        return view('movie.create', compact('stories', 'directors', 'companies', 'genres', 'actors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {

        $imageName = HasMedia::upload($request->file('image'), public_path('images\movies'));
        $data = $request->except('_token', 'image', 'genre_id', 'company_id', 'actor_id');
        $data['image'] = $imageName;
        $createdMovie = Movie::create($data);
        foreach ($request['genre_id'] as $genreid) {
            GenreMovie::create([
                "movie_id" => $createdMovie->id,
                "genre_id" => $genreid
            ]);
        }
        foreach ($request['company_id'] as $companyid) {
            CompanyMovie::create([
                "movie_id" => $createdMovie->id,
                "company_id" => $companyid
            ]);
        }
        foreach ($request['actor_id'] as $actorid) {
            ActorMovie::create([
                "movie_id" => $createdMovie->id,
                "actor_id" => $actorid
            ]);
        }
        return redirect()->route('movies.index')->with('success', 'Movie Created Successfully');
        //dd($createdMovie->id);
    }

    /**
     * remove movie from fav list
     *
     * @return \Illuminate\Http\Response
     */
    public function removefromfav($id)
    {
        DB::table('fav_movie')->where('user_id', '=', auth()->user()->id)->where('movie_id', '=', $id)->delete();
        return redirect()->route('movies.show', $id);
    }

    /**
     * set the move as favourite for user
     *
     * @return \Illuminate\Http\Response
     */
    public function addtofav($id)
    {
        if (DB::table('fav_movie')->where('user_id', '=', auth()->user()->id)->where('movie_id', '=', $id)->count() == 0) {
            DB::table('fav_movie')->insert([
                ['user_id' => auth()->user()->id, 'movie_id' => $id]
            ]);
        }
        return redirect()->route('movies.show', $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::where('id', $id)->first();
        if (auth()->user()) {
            // check if the user like movie and rate it 
            $fav =  DB::table('fav_movie')->where('user_id', '=', auth()->user()->id)->where('movie_id', '=', $id)->count();
            $rate =  DB::table('rate_movie')->where('user_id', '=', auth()->user()->id)->where('movie_id', '=', $id)->select('rate')->first();
        } else {
            $fav = 0;
            $rate = 0;
        }
        return view('movie.show', compact('movie', 'fav', 'rate'));
    }

    /**
     * add rate to the movie.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rate($id, Request $request)
    {
        $request->validate([
            'rate' => 'required|integer|max:10|min:0',
        ]);

        DB::table('rate_movie')
        ->updateOrInsert(
            ['user_id' => auth()->user()->id, 'movie_id' => $id],
            ['rate' => $request->rate]
        );
        return redirect()->route('movies.show', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stories = Story::get(['id', 'title']);
        $directors = Director::get(['id', 'first_name', 'last_name']);
        $companies = Company::get(['id', 'name']);
        $genres = Genre::get(['id', 'type']);
        $actors = Actor::get(['id', 'first_name', 'last_name']);
        $movie = Movie::findOrFail($id);
        $genres_selected = GenreMovie::where('movie_id', '=', $id)->pluck('genre_id')->toArray();
        $companies_selected = CompanyMovie::where('movie_id', '=', $id)->pluck('company_id')->toArray();
        $actors_selected = ActorMovie::where('movie_id', '=', $id)->pluck('actor_id')->toArray();
        return view('movie.edit', compact('stories', 'directors', 'companies', 'genres', 'actors', 'movie', 'genres_selected', 'companies_selected', 'actors_selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, $id)
    {
        $data = $request->except('_token', 'image', 'genre_id', 'company_id', 'actor_id');
        $movie = Movie::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = HasMedia::upload($request->file('image'), public_path('images\movies'));
            HasMedia::delete(public_path('images\movies\\' . $movie->image));
            $data['image'] = $imageName;
        }

        $movie->update($data);


        GenreMovie::where('movie_id', $id)->delete();
        foreach ($request['genre_id'] as $genreid) {
            GenreMovie::create([
                "movie_id" => $id,
                "genre_id" => $genreid
            ]);
        }
        CompanyMovie::where('movie_id', $id)->delete();
        foreach ($request['company_id'] as $companyid) {
            CompanyMovie::create([
                "movie_id" => $id,
                "company_id" => $companyid
            ]);
        }
        ActorMovie::where('movie_id', $id)->delete();
        foreach ($request['actor_id'] as $actorid) {
            ActorMovie::create([
                "movie_id" => $id,
                "actor_id" => $actorid
            ]);
        }
        return redirect()->route('movies.index')->with('success', 'Movie Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        if (file_exists(public_path('images\movies\\' . $movie->image))) { //delete old image
            unlink(public_path('images\movies\\' . $movie->image));
        }
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie Deleted Successfully');
    }
}
