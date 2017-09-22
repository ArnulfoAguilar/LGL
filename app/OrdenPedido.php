<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenPedido extends Model
{
    public function salidas()
    {
        return $this->hasMany('App\Salida');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    protected $fillable = [
    'cliente_id', 'numero', 'detalle', 'rutaArchivo', 'fechaIngreso', 'despachadoPor',
    ];

    protected $table = 'ordenPedidos';
}
