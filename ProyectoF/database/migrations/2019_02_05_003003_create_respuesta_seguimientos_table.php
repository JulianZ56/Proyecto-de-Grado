<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestaSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_seguimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idSeguimiento');
            $table->string('correo',200);
            $table->string('nombre',200);
            $table->string('apellido',200);
            $table->string('comentario',200);
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
        Schema::dropIfExists('respuesta_seguimientos');
    }
}
