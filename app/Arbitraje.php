<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arbitraje extends Model
{
  protected $table ='arbitrajes';
  protected $primaryKey = 'id';
  protected $fillable = [
      'fecha','valor_cancelado','valor_restante','jugador_id'
  ];
}
