<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('finalizado_por');
            $table->string('id_incidencias')->nullable();
            $table->string('id_incidencias_comunidades')->nullable();
            $table->string('finalizado')->nullable();
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
        Schema::dropIfExists('estado_incidencias');
    }
}
