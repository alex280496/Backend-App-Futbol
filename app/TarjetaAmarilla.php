<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarjetaAmarilla extends Model
{
  protected $table ='tarjeta_amarillas';
  protected $primaryKey = 'id_ta';
  protected $fillable = [
      'fecha','observaciones','jugador_id'
  ];
}
