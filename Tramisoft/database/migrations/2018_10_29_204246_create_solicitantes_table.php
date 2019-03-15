<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idIdentificacion');
            $table->integer('idOcupacion');
            $table->integer('idBarrio');
            $table->string('nombreSolicitante');
            $table->string('apellido');
            $table->string('tipoPersona');
            $table->string('numeroIdentificacion');
            $table->string('celular');
            $table->string('telefono');
            $table->enum('estrato' , array('1','2','3','4','5','6'));
            $table->string('vivienda');
            $table->enum('genero', array('Masculino','Femenino','Otro'));
            $table->enum('estadoCivil' , array('Soltero','Casado','Union Libre'));
            $table->string('eps');
            $table->string('email',30)->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('solicitantes');
    }
}
