<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccionProovedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accion_proovedores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_proovedores');
            $table->string('id_comunidades');
            $table->string('id_vecinos')->nullable();
            $table->string('id_incidencias')->nullable();
            $table->string('id_incidencias_comunidades')->nullable();
            $table->string('recibido');
            $table->string('fecha')->nullable();
            $table->string('notas')->nullable();
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
        Schema::dropIfExists('accion_proovedores');
    }
}
