<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
	
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    public function movimientos()
    {
    	return $this->hasMany('App\Movimiento');
    }

    protected $fillable = [
        'producto_id', 'cantidadActual', 'valorUnitarioActual', 'valorTotalActual',
    ];

    protected $table = 'kardexs';

}
