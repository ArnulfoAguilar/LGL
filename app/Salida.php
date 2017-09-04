<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{

	public function movimiento()
    {
        return $this->belongsTo('App\Movimiento');
    }

    public function cliente()
    {
        return $this->hasOne('App\Cliente');
    }
	
    protected $fillable = [
    'movimiento_id', 'tipo','cantidad', 'valor_unitario', 'cliente_id',
    ];
}
