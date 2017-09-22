<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
	public function entradas()
    {
        return $this->hasMany('App\Entrada');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }

    protected $fillable = [
    'proveedor_id', 'numero', 'detalle', 'rutaArchivo', 'fechaIngreso', 'ingresadoPor',
    ];
}
