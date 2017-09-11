<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{

	public function movimiento()
    {
        return $this->belongsTo('App\Movimiento');
    }

    public function ordenPedido()
    {
        return $this->hasOne('App\OrdenPedido');
    }
	
    protected $fillable = [
    'movimiento_id', 'tipo','cantidad', 'valorUnitario', 'ordenPedido_id',
    ];
}
