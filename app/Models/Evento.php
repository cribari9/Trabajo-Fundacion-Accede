<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at','fecha_inicio', 'fecha_termino'];


	protected $casts = [
	    'fecha_inicio' => 'date:d-m-Y',
	    'fecha_termino' => 'date:d-m-Y'
	];
}
