<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Munipicio extends Model
{
    protected $fillable = [
        'nombre', 'departamento_id',
    ];

    public function ordenesPedidos()
    {
        return $this->hasMany('App\OrdenPedido');
    }
}
