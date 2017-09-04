<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{

	public function movimiento()
    {
        return $this->belongsTo('App\Movimiento');
    }

    public function proveedor()
    {
        return $this->hasOne('App\Proveedor');
    }

    protected $fillable = [
    'movimiento_id', 'tipo','cantidad', 'valor_unitario', 'proveedor_id',
    ];
}
