<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{

    public function kardex()
    {
        return $this->belongsTo('App\Kardex');
    }

    public function tipoMovimiento()
    {
        return $this->belongsTo('App\TipoMovimiento');
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
    'kardex_id', 'tipoMovimiento_id', 'fechaIngreso', 'detalle','cantidadExistencia', 'valorUnitarioExistencia', 'valorTotalExistencia',
    ];
    
}
