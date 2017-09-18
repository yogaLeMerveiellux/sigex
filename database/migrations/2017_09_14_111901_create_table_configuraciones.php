<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableConfiguraciones extends Migration
{

    public function up()
    {
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreSistema')->default('SIGEx');
            $table->string('nombreInstitucion')->default('Nombre de la Institucion Educativa');
            $table->string('logo');
            $table->enum('skinOption',['skin-blue','skin-black','skin-purple','skin-yellow','skin-red','skin-green'])->default('skin-green');            
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
        Schema::dropIfExists('configuraciones');
    }
}
    /**
     * Run the migrations.
     *
     * @return void
     */

    // BODY TAG OPTIONS:
    // =================
    // Apply one or more of the following classes to get the
    // desired effect
    // |---------------------------------------------------------|
    // | SKINS         | skin-blue                               |
    // |               | skin-black                              |
    // |               | skin-purple                             |
    // |               | skin-yellow                             |
    // |               | skin-red                                |
    // |               | skin-green                              |
    // |---------------------------------------------------------|
    // |LAYOUT OPTIONS | fixed                                   |
    // |               | layout-boxed                            |
    // |               | layout-top-nav                          |
    // |               | sidebar-collapse                        |
    // |               | sidebar-mini                            |
    // |---------------------------------------------------------|
