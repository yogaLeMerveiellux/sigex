<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlumnos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idEstado')->unsigned();
            $table->integer('idMunicipio')->unsigned();
            $table->integer('idCurricular')->unsigned();
            $table->integer('idCarrera')->unsigned();
            $table->integer('idCiclo')->unsigned();

            $table->foreign('idEstado')->references('id')->on('estados')->onDelete('cascade');
            $table->foreign('idMunicipio')->references('id')->on('municipios')->onDelete('cascade');
            $table->foreign('idCurricular')->references('id')->on('curriculares')->onDelete('cascade');
            $table->foreign('idCarrera')->references('id')->on('carreras')->onDelete('cascade');
            $table->foreign('idCiclo')->references('id')->on('ciclosEscolares')->onDelete('cascade');

            $table->string('nombre');
            $table->string('aPaterno');
            $table->string('aMaterno');
            $table->string('calle');
            $table->string('telefono');
            $table->string('correo');
            $table->string('matricula');
            // $table->date('fechaInicio');            
            // $table->date('fechaFin');            
                   
            $table->enum('activo',['0','1'])->default('1');            
            
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
        Schema::dropIfExists('alumnos');
    }
}
