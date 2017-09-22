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
        return $this->belongsTo('App\Factura');
    }

    protected $fillable = [
    'movimiento_id', 'factura_id', 'cantidad', 'valorUnitario', 'valorTotal',
    ];
}
