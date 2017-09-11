<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    public function kardex()
    {
        return $this->hasOne('App\Kardex');
    }

    public function movimientos()
    {
        return $this->hasMany('App\Movimiento');
    }

    public function unidadMedida()
    {
        return $this->belongsTo('App\UnidadMedida','unidadMedida_id','id');
    }

    public function tipoProducto()
    {
        return $this->belongsTo('App\TipoProducto','tipoProducto_id','id');
    }
    
    protected $fillable = [
        'nombre', 'codigo', 'unidadMedida_id', 'tipoProducto_id','cantidad', 'valorUnitario', 'valorTotal', 'existenciaMin', 'existenciaMax',
    ];
}
