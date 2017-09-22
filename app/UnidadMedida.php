<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{

    public function productos()
    {
        return $this->hasMany('App\Producto');
    }

    protected $fillable = [
        'nombre', 'abreviatura',
    ];

    protected $table = 'unidadMedidas';
}
