<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    public function producto()
    {
        return $this->hasOne('App\Producto');
    }

    protected $fillable = [
        'tipo', 'codigo',
    ];

    protected $table = 'tipoProductos';

}
