<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Equipo;
use App\Arbitraje;
class Jugador extends Model
{
    public function equipo(){
      return $this->belongsTo(Equipo::class);
    }
    public function arbitrajes (){
      return $this->hasMany(Arbitraje::class);
    }
}
