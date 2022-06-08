<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscritos', function (Blueprint $table) {
            $table->bigIncrements('id_inscrito');
            $table->integer('id_evento')->references('id_evento')->on('eventos')->onDelete('cascade');
            $table->string('nombre',255);
            $table->string('apellido_paterno',255);
            $table->string('apellido_materno',255)->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('correo',255)->nullable();
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
        Schema::dropIfExists('inscritos');
    }
}
