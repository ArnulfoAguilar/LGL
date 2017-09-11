<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
	public function entrada()
    {
        return $this->belongsTo('App\Entrada');
    }

    public function proveedor()
    {
        return $this->hasOne('App\Proveedor');
    }

    protected $fillable = [
    'numero', 'ingresadoPor','rutaArchivo', 'proveedor_id',
    ];
}
