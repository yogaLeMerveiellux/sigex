<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfesores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCurricular')->unsigned();
            $table->foreign('idCurricular')->references('id')->on('curriculares')->onDelete('cascade');

            $table->string('nombre');
            $table->string('aPaterno');
            $table->string('correo');
            $table->string('telefono');
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
        Schema::dropIfExists('profesores');
    }
}
