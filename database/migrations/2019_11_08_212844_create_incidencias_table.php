<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('atendido');
            $table->string('id_vecinos');
            $table->string('id_proovedores')->nullable();
            $table->text('incidenia')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('accion')->nullable();
            $table->string('tipo_contacto')->nullable();
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
        Schema::dropIfExists('incidencias');
    }
}
