<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArbitrajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arbitrajes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->float('valor_cancelado');
            $table->float('valor_restante');
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
        Schema::dropIfExists('arbitrajes');
    }
}
