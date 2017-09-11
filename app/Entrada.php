<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{

	public function movimiento()
    {
        return $this->belongsTo('App\Movimiento');
    }

    public function factura()
    {
        return $this->hasOne('App\Factura');
    }

    protected $fillable = [
    'movimiento_id', 'tipo','cantidad', 'valorUnitario', 'factura_id',
    ];
}
