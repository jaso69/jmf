<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVecinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vecinos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('comunidades_id');
            $table->string('nombre');
            $table->string('apellidos')->nullable();
            $table->string('dni')->nullable();
            $table->string('telefono')->nullable();
            $table->string('movil')->nullable();
            $table->string('email')->nullable();
            $table->string('escalera')->nullable();
            $table->string('piso')->nullable();
            $table->string('letra')->nullable();
            $table->string('cargo')->nullable();
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
        Schema::dropIfExists('vecinos');
    }
}
