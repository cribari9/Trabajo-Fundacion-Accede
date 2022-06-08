<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fundacion;

class FundacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fundacion = new Fundacion();
        $fundacion->direccion ="Valparaíso, Chile";
        $fundacion->telefono1 ="993980258";
        $fundacion->telefono2 ="";
        $fundacion->facebook ="FundacionAccede.Chile";
        $fundacion->twitter ="AccedeFundacion";
        $fundacion->instagram ="fundacion_accede";
        $fundacion->youtube ="";
        $fundacion->linkedin ="";
        $fundacion->correo1 ="contacto@fundacionaccede.cl";
        $fundacion->correo2 ="";
        $fundacion->mision ="";
        $fundacion->vision ="";
        $fundacion->imagen1 ="portada_1.png";
        $fundacion->imagen2 ="portada_2.jpg";
        $fundacion->imagen3 ="aporte.jpg";
        $fundacion->save();
    }
}
