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
        'nombre', 'telefono_principal', 'telefono_secundario', 'contacto','direccion',
    ];

    protected $table = 'proveedores';
}
