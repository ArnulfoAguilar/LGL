<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{

    public function producto()
    {
        return $this->hasMany('App\Producto');
    }

    protected $fillable = [
        'nombre', 'abreviatura',
    ];

    protected $table = 'unidadMedidas';
}
