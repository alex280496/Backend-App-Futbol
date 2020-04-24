<?php

namespace App\Http\Controllers;

use App\TarjetaAmarilla;
use Illuminate\Http\Request;
use DB;
class TarjetaAmarillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarjetas_amarillas=DB::table('tarjeta_amarillas as tamarilla')
        ->join('jugadors as jugador','tamarilla.jugador_id','=','jugador.id')
        ->select('tamarilla.id_ta','tamarilla.fecha','tamarilla.observaciones','jugador.nombrejugador','jugador.cedula','jugador.id')
        ->get();
        return ($tarjetas_amarillas);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarjeta_amarilla=new TarjetaAmarilla();
        $tarjeta_amarilla->fecha=$request->input('fecha');
        $tarjeta_amarilla->observaciones=$request->input('observaciones');
        $tarjeta_amarilla->jugador_id=$request->input('jugador_id');
        $tarjeta_amarilla->save();
        return ($tarjeta_amarilla);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TarjetaAmarilla  $tarjetaAmarilla
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarjeta_amarilla=DB::table('tarjeta_amarillas as tamarilla')
        ->join('jugadors as jugador','tamarilla.jugador_id','=','jugador.id')
        ->select('tamarilla.id_ta','tamarilla.fecha','tamarilla.observaciones','jugador.nombrejugador','jugador.cedula','jugador.id')
        ->where('tamarilla.id_ta','=',$id)
        ->get();
        return ($tarjeta_amarilla);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TarjetaAmarilla  $tarjetaAmarilla
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $tarjeta_amarilla=TarjetaAmarilla::find($id);
        $tarjeta_amarilla->fecha=$request->input('fecha');
        $tarjeta_amarilla->observaciones=$request->input('observaciones');
        $tarjeta_amarilla->jugador_id=$request->input('jugador_id');
        $tarjeta_amarilla->save();
        return ($tarjeta_amarilla);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TarjetaAmarilla  $tarjetaAmarilla
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tamarilla=TarjetaAmarilla::find($id);
        $tamarilla->delete();
        return ($tamarilla);
    }
}
