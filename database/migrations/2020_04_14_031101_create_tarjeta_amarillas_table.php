<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarjetaAmarillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarjeta_amarillas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->string('observaciones');
            //FK tabla jugador
            $table->unsignedInteger('jugador_id');
            $table->foreign('jugador_id')->references('id')->on('jugadors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarjeta_amarillas');
    }
}
