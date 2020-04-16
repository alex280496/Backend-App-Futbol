<?php

namespace App\Http\Controllers;

use App\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos=Equipo::all();
        echo  json_encode ($equipos);
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
        $equipo=new Equipo();
        $equipo->nombre=$request->input('nombre');
        $equipo->categoria=$request->input('categoria');
        $equipo->save();
        echo json_encode($equipo);


    }
    public function guardarimagen(Request $request){
      $equipo=Equipo::all();
      $ultimo=($equipo->last());

      $file=$request->file('imagen');
      $path=public_path().'/images/equipos';
      $fileName=uniqid().'-'.$file->getClientOriginalName();
      $moved=$file->move($path,$fileName);
      if($moved){
        $ultimo->imagen=$fileName;
        $ultimo->save();//insert en la bd
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $equipo=Equipo::find($id);
      echo json_encode($equipo);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $equipo=Equipo::find($id);
        $equipo->nombre=$request->input('nombre');
        $equipo->categoria=$request->input('categoria');
        if($request->hasFile('imagen')){
          $file=$request->file('imagen');
          $path=public_path().'/images/equipos';
          $fileName=uniqid().'-'.$file->getClientOriginalName();
          $moved=$file->move($path,$fileName);

          if($moved){
            $equipo->imagen=$fileName;
            $equipo->save();
            echo json_encode($equipo);
          }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $equipo=Equipo::find($id);
      $equipo->delete();
      echo json_encode($equipo);

    }
}
