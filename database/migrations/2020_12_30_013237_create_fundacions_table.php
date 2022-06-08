<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fundacions', function (Blueprint $table) {
            $table->bigIncrements('id_fundacion');
            $table->string('direccion',255);
            $table->string('telefono1',20)->nullable();
            $table->string('telefono2',20)->nullable();
            $table->string('facebook',100)->nullable();
            $table->string('twitter',100)->nullable();
            $table->string('instagram',100)->nullable();
            $table->string('youtube',100)->nullable();
            $table->string('linkedin',100)->nullable();
            $table->string('correo1')->nullable();
            $table->string('correo2')->nullable();
            $table->string('mision',255)->nullable();
            $table->string('vision',255)->nullable();
            $table->string('imagen1');
            $table->string('imagen2');
            $table->string('imagen3');
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
        Schema::dropIfExists('fundacions');
    }
}
