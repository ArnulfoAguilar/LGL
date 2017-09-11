<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

	public function salida()
    {
        return $this->belongsTo('App\Salida');
    }

    protected $fillable = [
        'nombre', 'telefonoPrincipal', 'telefonoSecundario', 'contacto','direccion',
    ];
}
