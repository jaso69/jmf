<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasComunidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias_comunidades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('atendido');
            $table->string('id_comunidades');
            $table->string('id_proovedores')->nullable();
            $table->string('persona_contacto')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->string('email_contacto')->nullable();
            $table->string('motivo')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('accion')->nullable();
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
        Schema::dropIfExists('incidencias_comunidades');
    }
}
