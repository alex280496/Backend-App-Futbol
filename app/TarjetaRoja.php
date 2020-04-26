<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarjetaRoja extends Model
{
  protected $table ='tarjeta_rojas';
  protected $primaryKey = 'id_tr';
  protected $fillable = [
      'fecha','observaciones','jugador_id'
  ];
}
