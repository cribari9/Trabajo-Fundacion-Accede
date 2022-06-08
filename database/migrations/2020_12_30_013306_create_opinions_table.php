<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinions', function (Blueprint $table) {
            $table->bigIncrements('id_opinion');
            $table->integer('id_autor');
            $table->string('autor',255);
            $table->string('titulo',255);
            $table->text('contenido');
            $table->text('descripcion');
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->string('imagen',255)->nullable();
            $table->string('portada',255)->nullable();
            $table->string('video',255)->nullable();
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
        Schema::dropIfExists('opinions');
    }
}
