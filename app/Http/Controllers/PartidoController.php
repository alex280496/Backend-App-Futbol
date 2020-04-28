<?php

namespace App\Http\Controllers;

use App\Partido;
use Illuminate\Http\Request;
use DB;
class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partido=DB::table('partidos as partido')
        ->join('equipos as equipo', 'partido.equipo_id','=','equipo.id_equipo')
        ->select('partido.id','partido.fecha','partido.puntos','equipo.id_equipo','equipo.nombre')
        ->get();
        return ($partido);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $partido =new Partido();
        $partido->fecha=$request->input('fecha');
        $partido->puntos=$request->input('puntos');
        $partido->equipo_id=$request->input('equipo_id');
        $partido->save();

        return ($partido);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $partido=DB::table('partidos as partido')
      ->join('equipos as equipo' ,'partido.equipo_id','=','equipo.id_equipo')
      ->select('partido.id','partido.fecha','partido.puntos', 'equipo.id_equipo','equipo.nombre')
      ->where('partido.id','=',$id)
      ->get();
      return ($partido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $partido=Partido::find($id);
        $partido->fecha=$request->input('fecha');
        //$partido->rival=$request->input('rival');
        $partido->puntos=$request->input('puntos');
        $partido->equipo_id=$request->input('equipo_id');
        $partido->save();

        return ($partido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partido  $partido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partido=Partido::find($id);
        $partido->delete();
        return ($partido);
    }
}
