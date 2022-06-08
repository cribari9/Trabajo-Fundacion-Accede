<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->string('rut_miembro');
            $table->string('nombre',255);
            $table->string('apellido_paterno',255);
            $table->string('apellido_materno',255)->nullable();
            $table->string('telefono',20)->nullable();
            $table->string('cargo',255)->nullable();
            $table->string('foto',255)->nullable();
            $table->string('correo',255)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('facebook',100)->nullable();
            $table->string('twitter',100)->nullable();
            $table->string('linkedin',100)->nullable();
            $table->string('instagram',100)->nullable();
            $table->string('email')->unique();
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
        Schema::dropIfExists('miembros');
    }
}
