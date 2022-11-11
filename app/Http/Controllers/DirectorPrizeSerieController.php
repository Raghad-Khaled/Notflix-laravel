<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDirectorPrizeSerieRequest;
use App\Models\Director;
use App\Models\DirectorPrizeSerie;
use App\Models\Prize;
use App\Models\Serie;
use Illuminate\Http\Request;

class DirectorPrizeSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prizes = DirectorPrizeSerie::join('directors', 'directors.id', '=', 'director_prize_series.director_id')
            ->join('series', 'series.id', '=', 'director_prize_series.serie_id')
            ->join('prizes', 'prizes.id', '=', 'director_prize_series.prize_id')
            ->select([
                'director_prize_series.*', 'directors.first_name AS director_first_name', 'directors.last_name AS director_last_name',
                'series.name AS serie', 'prizes.title AS prize_title', 'prizes.type AS prize_type'
        ])->paginate(10);
        return view('directorprizeserie.index', compact('prizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prizes = Prize::get(['id', 'title', 'type']);
        $directors = Director::get(['id', 'first_name', 'last_name']);
        $series = Serie::get(['id', 'name']);
        return view('directorprizeserie.create', compact('prizes', 'series', 'directors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDirectorPrizeSerieRequest $request)
    {
        $data = $request->except('_token');
        DirectorPrizeSerie::create($data);
        return redirect()->route('directorprizeseries')->with('success', 'Prize Created Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($director_id, $prize_id, $serie_id)
    {
        $prize = DirectorPrizeSerie::where('director_id', $director_id)->where('prize_id', $prize_id)->where('serie_id', $serie_id);
        $prize->delete();
        return redirect()->route('directorprizeseries')->with('success', 'Prize Deleted Successfully');
    }
}
