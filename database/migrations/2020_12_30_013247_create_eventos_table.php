<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id_evento');
            $table->string('nombre',255);
            $table->text('descripcion');
            $table->string('responsable',255);
            $table->string('email_contacto',255);
            $table->date('fecha_inicio');
            $table->date('fecha_termino')->nullable();
            $table->time('hora_inicio')->nullable();
            $table->time('hora_termino')->nullable();
            $table->string('lugar',255);
            $table->integer('inscritos')->nullable();
            $table->integer('capacidad')->nullable();
            $table->string('imagen')->nullable();
            $table->string('video')->nullable();
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
        Schema::dropIfExists('eventos');
    }
}
