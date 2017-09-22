<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

	public function ordenPedidos()
    {
        return $this->hasMany('App\Salida');
    }

    protected $fillable = [
        'nombre', 'telefonoPrincipal', 'telefonoSecundario', 'contacto','direccion',
    ];
}
