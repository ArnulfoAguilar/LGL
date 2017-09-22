<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function unidadMedida()
    {
        return $this->belongsTo('App\UnidadMedida','unidadMedida_id','id');
    }

    public function tipoProducto()
    {
        return $this->belongsTo('App\TipoProducto','tipoProducto_id','id');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria','categoria_id','id');
    }

    public function kardex()
    {
        return $this->hasOne('App\Kardex');
    }
    
    protected $fillable = [
        'unidadMedida_id', 'tipoProducto_id', 'categoria_id', 'nombre', 'codigo', 'existenciaMin', 'existenciaMax',
    ];
}
