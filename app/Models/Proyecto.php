<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at','fecha'];

    public function imagenesproyectos()
    {
        return $this->hasMany('App\Imgproyectos');
    }


	protected $casts = [
	    'fecha' => 'date:m ([ \t.-])* YY',
	];
}
