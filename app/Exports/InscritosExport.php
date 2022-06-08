<?php

namespace App\Exports;

use App\Models\Inscrito;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InscritosExport implements FromCollection,WithHeadings
{


	public function headings():array{
		return[
			'Id inscrito',
			'Id evento',
			'Nombre',
			'Apellido paterno',
			'Apellido materno',
			'Telefono',
			'Correo'
			];
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Inscrito::select("id_inscrito","id_evento","nombre","apellido_paterno","apellido_materno","telefono","correo")->get();
    }
}
