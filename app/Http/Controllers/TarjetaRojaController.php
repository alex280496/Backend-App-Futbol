<?php

namespace App\Http\Controllers;

use App\TarjetaRoja;
use Illuminate\Http\Request;

class TarjetaRojaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trojas=DB::table('tarjeta_rojas as troja')
        ->join('jugadors a jugador','troja.jugador_id','=','jugador.id')
        ->select('troja.id_tr','troja.fecha','troja.observaciones','jugador.nombrejugador','jugador.cedula','jugador.id')
        ->get();
        return ($trojas);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $troja=new TarjetaRoja():
        $troja->fecha=$request->input('fecha');
        $troja->observaciones=$request->input('observaciones');
        $troja->jugador_id=$request->input('jugador_id');

        return ($troja);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TarjetaRoja  $tarjetaRoja
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $troja=DB::table('tarjeta_rojas as troja' )
        ->join('jugadors as jugador','troja.jugador_id','jugador.id')
        ->select('troja.id_tr','troja.fecha','troja.observaciones','jugador.nombrejugador','jugador.cedula','jugador.id')
        ->where('troja.id_tr','=',$id)
        ->get():
        return ($troja);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TarjetaRoja  $tarjetaRoja
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $troja=TarjetaRoja::find($id);
        $troja->fecha=$request->input('fecha');
        $troja->observaciones=$request->input('observaciones');
        $troja->jugador_id=$request->input('jugador_id');

        $troja->save();
        return ($troja);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TarjetaRoja  $tarjetaRoja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $troja=TarjetaRoja::find($id);
        $troja->delete();
        return ($troja);
    }
}
