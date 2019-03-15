<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_tramites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idDependencia');
            $table->string('nombreCatalogo');
            $table->integer('numeroDocumentos');
            $table->string('descripcionCatalogo');
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
        Schema::dropIfExists('catalogo_tramites');
    }
}
