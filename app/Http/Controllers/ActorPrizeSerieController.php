<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActorPrizeSerieRequest;
use App\Models\Actor;
use App\Models\ActorPrizeSerie;
use App\Models\Prize;
use App\Models\Serie;
use Illuminate\Http\Request;

class ActorPrizeSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prizes = ActorPrizeSerie::join('actors', 'actors.id', '=', 'actor_prize_series.actor_id')
            ->join('series', 'series.id', '=', 'actor_prize_series.serie_id')
            ->join('prizes', 'prizes.id', '=', 'actor_prize_series.prize_id')
            ->select([
                'actor_prize_series.*', 'actors.first_name AS actor_first_name', 'actors.last_name AS actor_last_name',
                'series.name AS serie', 'prizes.title AS prize_title', 'prizes.type AS prize_type'
        ])->paginate(10);
        return view('actorprizeserie.index', compact('prizes'));
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
        $series = Serie::get(['id', 'name']);
        return view('actorprizeserie.create', compact('prizes', 'series', 'actors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActorPrizeSerieRequest $request)
    {
        $data = $request->except('_token');
        ActorPrizeSerie::create($data);
        return redirect()->route('actorprizeseries')->with('success', 'Prize Created Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($actor_id, $prize_id, $serie_id)
    {
        $prize = ActorPrizeSerie::where('actor_id', $actor_id)->where('prize_id', $prize_id)->where('serie_id', $serie_id);
        $prize->delete();
        return redirect()->route('actorprizeseries')->with('success', 'Prize Deleted Successfully');
    }
}
