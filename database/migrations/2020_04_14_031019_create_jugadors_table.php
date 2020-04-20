<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula');
            $table->string('nombrejugador');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('posicion_juego');
            $table->integer('numero');
            $table->date('fecha_nacimiento');
            $table->string('imagen')->nullable();
            //FK tabla equipo
            $table->unsignedInteger('equipo_id')->nullable();
            $table->foreign('equipo_id')->references('id')->on('equipos');

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
        Schema::dropIfExists('jugadors');
    }
}
