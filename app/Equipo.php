<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jugador;

class Equipo extends Model
{
    public function jugadores(){
     return  $this->hasMany(Jugador::class);
    }
}
