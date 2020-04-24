<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jugador;
class Arbitraje extends Model
{
  protected $table ='arbitrajes';
  protected $primaryKey = 'id_arbitraje';
  protected $fillable = [
      'fecha','valor_cancelado','valor_restante','jugador_id'
  ];
  public function jugador(){
    return $this->belongsTo(Jugador::class);
  }
}
