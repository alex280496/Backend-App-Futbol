<?php

namespace App\Http\Controllers;

use App\TarjetaAmarilla;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TarjetaAmarilla  $tarjetaAmarilla
     * @return \Illuminate\Http\Response
     */
    public function show(TarjetaAmarilla $tarjetaAmarilla)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TarjetaAmarilla  $tarjetaAmarilla
     * @return \Illuminate\Http\Response
     */
    public function edit(TarjetaAmarilla $tarjetaAmarilla)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TarjetaAmarilla  $tarjetaAmarilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TarjetaAmarilla $tarjetaAmarilla)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TarjetaAmarilla  $tarjetaAmarilla
     * @return \Illuminate\Http\Response
     */
    public function destroy(TarjetaAmarilla $tarjetaAmarilla)
    {
        //
    }
}
