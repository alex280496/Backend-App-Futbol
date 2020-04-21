<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jugador;


class Equipo extends Model
{
  protected $table ='equipos';
  protected $primaryKey = 'id_equipo';
  protected $fillable = [
      'nombre','categoria'
  ];
    public function jugadores(){
     return  $this->hasMany(Jugador::class);
    }
}
