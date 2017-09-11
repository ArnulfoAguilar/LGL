<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    public function entrada()
    {
        return $this->hasOne('App\Entrada');
    }

    public function salida()
    {
        return $this->hasOne('App\Salida');
    }

    protected $fillable = [
    'producto_id', 'detalle','cantidadExistencia', 'valorUnitarioExistencia',
    ];
    
}
