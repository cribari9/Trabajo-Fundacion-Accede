<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoluntariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntarios', function (Blueprint $table) {
            $table->string('rut_voluntario');
            $table->string('nombre',255);
            $table->string('apellido_paterno',255);
            $table->string('apellido_materno',255)->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('correo',255)->nullable();
            $table->string('edad',10)->nullable();
            $table->string('region',255)->nullable();
            $table->string('ocupacion',255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voluntarios');
    }
}
