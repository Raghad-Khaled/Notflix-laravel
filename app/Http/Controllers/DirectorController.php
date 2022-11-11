<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActorRequest;
use App\Http\Requests\UpdateActorRequest;
use App\Models\Advertisement;
use App\Models\Director;
use App\Models\DirectorPrizeMovie;
use App\Models\DirectorPrizeSerie;
use App\Services\HasMedia;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Director::paginate(10);
        return view('director.index', compact('directors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('director.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * validation is same in stor actor requist and stor director request
     */
    public function store(StoreActorRequest $request)
    {
        $imageName = HasMedia::upload($request->file('image'), public_path('images\Directors'));
        $data = $request->except('_token', 'image');
        $data['image'] = $imageName;
        Director::create($data);
        return redirect()->route('directors')->with('success', 'Director Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $director = Director::findOrFail($id);
        $advertisement = Advertisement::all()->random(1)->first();
        $prizesmovies = DirectorPrizeMovie::where('director_prize_movies.director_id', $id)
            ->join('prizes', 'prizes.id', '=', 'director_prize_movies.prize_id')
            ->join('movies', 'movies.id', '=', 'director_prize_movies.movie_id')
            ->select(['movies.id', 'movies.name', 'prizes.title', 'prizes.type', 'director_prize_movies.year'])->get();

        $prizesseries = DirectorPrizeSerie::where('director_prize_series.director_id', $id)
            ->join('prizes', 'prizes.id', '=', 'director_prize_series.prize_id')
            ->join('series', 'series.id', '=', 'director_prize_series.serie_id')
            ->select(['series.id', 'series.name', 'prizes.title', 'prizes.type', 'director_prize_series.year'])->get();
        return view('director.show', compact('director', 'advertisement', 'prizesmovies', 'prizesseries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $director = Director::findOrFail($id);
        return view('director.edit', compact('director'));
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
        $director = Director::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = HasMedia::upload($request->file('image'), public_path('images\directors'));
            HasMedia::delete(public_path('images\directord\\' . $director->image));
            $data['image'] = $imageName;
        }

        $director->update($data);
        return redirect()->route('directors')->with('success', 'Director Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $director = Director::findOrFail($id);
        if (file_exists(public_path('images\Directors\\' . $director->image))) { //delete old image
            unlink(public_path('images\Directors\\' . $director->image));
        }
        $director->delete();
        return redirect()->route('directors')->with('success', 'Director Deleted Successfully');
    }
}
