<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Equipo;
class Jugador extends Model
{
    public function equipo(){
      return $this->belongsTo(Equipo::class);
    }
}
