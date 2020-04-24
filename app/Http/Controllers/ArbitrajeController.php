<?php

namespace App\Http\Controllers;

use App\Arbitraje;
use Illuminate\Http\Request;
use DB;
class ArbitrajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$arbitrajes=Arbitraje::all();
        //return $arbitrajes;

        $arbitrajes=DB::table('arbitrajes as arbitraje')
        ->join('jugadors as jugador','arbitraje.jugador_id','=','jugador.id')
        ->select('arbitraje.id_arbitraje','arbitraje.fecha','arbitraje.valor_cancelado','arbitraje.valor_restante','jugador.nombrejugador','jugador.apellido','jugador.cedula')
        ->get();
        return ($arbitrajes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $arbitraje=new Arbitraje();
        $arbitraje->fecha=$request->input('fecha');
        $arbitraje->valor_cancelado=$request->input('valor_cancelado');
        $arbitraje->valor_restante=$request->input('valor_restante');
        $arbitraje->jugador_id=$request->input('jugador_id');
        $arbitraje->save();
        return $arbitraje;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Arbitraje  $arbitraje
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $arbitraje=DB::table('arbitrajes as arbitraje')
      ->join('jugadors as jugador','arbitraje.jugador_id','=','jugador.id')
      ->select('arbitraje.id_arbitraje','arbitraje.fecha','arbitraje.valor_cancelado','arbitraje.valor_restante','jugador.nombrejugador','jugador.apellido','jugador.id')
      ->where ('arbitraje.id_arbitraje','=',$id)
      ->get();
      return ($arbitraje);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Arbitraje  $arbitraje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $arbitraje=Arbitraje::find($id);
        $arbitraje->fecha=$request->input('fecha');
        $arbitraje->valor_cancelado=$request->input('valor_cancelado');
        $arbitraje->valor_restante=$request->input('valor_restante');
        $arbitraje->jugador_id=$request->input('jugador_id');
        $arbitraje->save();
        return $arbitraje;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Arbitraje  $arbitraje
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arbitraje=Arbitraje::find($id);
        $arbitraje->destroy();
        return $arbitraje;
    }
}
