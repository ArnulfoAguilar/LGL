<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

	public function facturas()
    {
        return $this->hasMany('App\Movimiento');
    }

    protected $fillable = [
        'nombre', 'telefonoPrincipal', 'telefonoSecundario', 'contacto','direccion',
    ];

    protected $table = 'proveedores';
}
