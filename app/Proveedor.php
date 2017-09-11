<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

	public function entrada()
    {
        return $this->belongsTo('App\Movimiento');
    }

    protected $fillable = [
        'nombre', 'telefonoPrincipal', 'telefonoSecundario', 'contacto','direccion',
    ];

    protected $table = 'proveedores';
}
