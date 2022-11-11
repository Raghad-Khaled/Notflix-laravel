<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSerieRequest;
use App\Http\Requests\UpdateSerieRequest;
use App\Models\Actor;
use App\Models\ActorSerie;
use App\Models\Company;
use App\Models\CompanySerie;
use App\Models\Director;
use App\Models\Genre;
use App\Models\GenreSerie;
use App\Models\Serie;
use App\Services\HasMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Serie::leftjoin('directors', 'directors.id', '=', 'series.director_id')
        ->select(['series.*', 'directors.first_name', 'directors.last_name'])->paginate(10);
        return view('serie.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directors = Director::all();
        $companies = Company::all();
        $genres = Genre::all();
        $actors = Actor::all();
        return view('serie.create', compact('directors', 'companies', 'genres', 'actors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSerieRequest $request)
    {
        $imageName = HasMedia::upload($request->file('image'), public_path('images\series'));
        $data = $request->except('_token', 'image', 'genre_id', 'company_id', 'actor_id');
        $data['image'] = $imageName;
        $createdSerie = Serie::create($data);
        foreach ($request['genre_id'] as $genreid) {
            GenreSerie::create([
                "serie_id" => $createdSerie->id,
                "genre_id" => $genreid
            ]);
        }
        foreach ($request['company_id'] as $companyid) {
            CompanySerie::create([
                "serie_id" => $createdSerie->id,
                "company_id" => $companyid
            ]);
        }
        foreach ($request['actor_id'] as $actorid) {
            ActorSerie::create([
                "serie_id" => $createdSerie->id,
                "actor_id" => $actorid
            ]);
        }
        return redirect()->route('series.index')->with('success', 'Serie Created Successfully');
    }

    /**
     * remove movie from fav list
     *
     * @return \Illuminate\Http\Response
     */
    public function removefromfav($id)
    {
        DB::table('fav_series')->where('user_id', '=', auth()->user()->id)->where('serie_id', '=', $id)->delete();
        return redirect()->route('series.show', $id);
    }

    /**
     * set the move as favourite for user
     *
     * @return \Illuminate\Http\Response
     */
    public function addtofav($id)
    {
        if (DB::table('fav_series')->where('user_id', '=', auth()->user()->id)->where('serie_id', '=', $id)->count() == 0) {
            DB::table('fav_series')->insert([
                ['user_id' => auth()->user()->id, 'serie_id' => $id]
            ]);
        }
        return redirect()->route('series.show', $id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serie = Serie::where('id', $id)->first();
        if (auth()->user()) {
            $fav =  DB::table('fav_series')->where('user_id', '=', auth()->user()->id)->where('serie_id', '=', $id)->count();
            $rate =  DB::table('rate_series')->where('user_id', '=', auth()->user()->id)->where('serie_id', '=', $id)->select('rate')->first();
        } else {
            $fav = 0;
            $rate = 0;
        }
        return view('serie.show', compact('serie', 'fav', 'rate'));
    }

    /**
     * add rate to the series.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rate($id, Request $request)
    {
        $request->validate([
            'rate' => 'required|integer|max:10|min:0',
        ]);

        DB::table('rate_series')
        ->updateOrInsert(
            ['user_id' => auth()->user()->id, 'serie_id' => $id],
            ['rate' => $request->rate]
        );
        return redirect()->route('series.show', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $directors = Director::all();
        $companies = Company::all();
        $genres = Genre::all();
        $actors = Actor::all();
        $serie = Serie::findOrFail($id);
        $genres_selected = GenreSerie::where('serie_id', '=', $id)->pluck('genre_id')->toArray();
        $companies_selected = CompanySerie::where('serie_id', '=', $id)->pluck('company_id')->toArray();
        $actors_selected = ActorSerie::where('serie_id', '=', $id)->pluck('actor_id')->toArray();
        return view('serie.edit', compact('directors', 'companies', 'genres', 'actors', 'serie', 'genres_selected', 'companies_selected', 'actors_selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSerieRequest $request, $id)
    {
        $data = $request->except('_token', 'image', 'genre_id', 'company_id', 'actor_id');
        $serie = Serie::findOrFail($id);
        if ($request->hasFile('image')) {
            $imageName = HasMedia::upload($request->file('image'), public_path('images\series'));
            HasMedia::delete(public_path('images\series\\' . $serie->image));
            $data['image'] = $imageName;
        }

        $serie->update($data);


        GenreSerie::where('serie_id', $id)->delete();
        foreach ($request['genre_id'] as $genreid) {
            GenreSerie::create([
                "serie_id" => $id,
                "genre_id" => $genreid
            ]);
        }
        CompanySerie::where('serie_id', $id)->delete();
        foreach ($request['company_id'] as $companyid) {
            CompanySerie::create([
                "serie_id" => $id,
                "company_id" => $companyid
            ]);
        }
        ActorSerie::where('serie_id', $id)->delete();
        foreach ($request['actor_id'] as $actorid) {
            ActorSerie::create([
                "serie_id" => $id,
                "actor_id" => $actorid
            ]);
        }
        return redirect()->route('series.index')->with('success', 'Serie Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie = Serie::findOrFail($id);
        if (file_exists(public_path('images\series\\' . $serie->image))) { //delete old image
            unlink(public_path('images\series\\' . $serie->image));
        }
        $serie->delete();
        return redirect()->route('series.index')->with('success', 'Movie Deleted Successfully');
    }
}
