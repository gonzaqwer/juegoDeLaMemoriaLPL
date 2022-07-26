<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayRequest;
use App\Models\Play;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $plays = DB::table('plays')
        ->orderBy('aciertos', 'desc')
        ->where('user_id', auth()->user()->id)
        ->where(function ($query) {
            $query->where('estado', 'gano');
        })
        ->paginate(2);
        // ->get();
    
        // echo view('juegoMemoria', compact('plays'));
        return view('juegoMemoria', compact('plays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayRequest $request)
    {
        //
        // dump($request->all());
        // $partida = new Play();
        // $partida->user_id = Auth::user();
        // $partida::create($request->validated());
        // dump($request->all() + ['user_id' => auth()->id()]);
        
        // dump($request->all() + ['user_id' => auth()->id()]);

        Play::create($request->all() + ['user_id' => auth()->id()]);
        // $request->user_id = Auth::id();
        // Play::create($request->validated());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Play  $play
     * @return \Illuminate\Http\Response
     */
    public function show(Play $play)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Play  $play
     * @return \Illuminate\Http\Response
     */
    public function edit(Play $play)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Play  $play
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Play $play)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Play  $play
     * @return \Illuminate\Http\Response
     */
    public function destroy(Play $play)
    {
        //
    }
}
