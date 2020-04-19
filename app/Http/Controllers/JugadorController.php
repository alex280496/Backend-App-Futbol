<?php

namespace App\Http\Controllers;

use App\Jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores=Jugador::all();
        return json_encode($jugadores);
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
    public function store(Request $request)
    {
        $jugador=new Jugador();
        $jugador->cedula=$request->input('cedula');
        $jugador->nombre=$request->input('nombre');
        $jugador->apellido=$request->input('apellido');
        $jugador->telefono=$request->input('telefono');
        $jugador->posicion_juego=$request->input('posicion_juego');
        $jugador->numero=$request->input('numero');
        $jugador->fecha_nacimiento=$request->input('fecha_nacimiento');
        $jugador->save();

    }
    public function guardarimagenjugador(Request $request,$id){
      $jugador=Jugador::find($id);
      if($request->hasfile('imagen')){
        $file=$request->file('imagen');
        $path=public_path().'/images/jugadores';
        $fileName=uniqid().'-'.$file->getClientOriginalName();
        $moved=$file->move($path,$fileName);
        if($moved){
          $jugador->imagen=$fileName;
          $jugador->save();//insert en la bd
          return json_encode($jugador);
        }
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jugador=Jugador::find($id);
         return json_encode($jugador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$id)
    {
        $jugador=Jugador::find($id);
        $jugador->cedula=$request->input('cedula');
        $jugador->nombre=$request->input('nombre');
        $jugador->apellido=$request->input('apellido');
        $jugador->telefono=$request->input('apellido');
        $jugador->posicion_juego=$request->input('posicion_juego');
        $jugador->numero=$request->input('numero');
        $jugador->fecha_nacimiento=$request->input('fecha_nacimiento');
        if($request->hasfile('imagen')){
          $file=$request->file('imagen');
          $path=public_path().'/images/jugadores';
          $fileName=uniqid().'-'.$file->getClientOriginalName();
          $moved=$file->move($path,$fileName);
          if($moved){
            $jugador->imagen=$fileName;
            $jugador->save();//insert en la bd
            return  json_encode($jugador);
          }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jugador  $jugador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jugador=Jugador::find($id);
        $jugador->delete();
        return json_encode($jugador);
    }
}
