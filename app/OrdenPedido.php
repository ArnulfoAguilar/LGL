<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenPedido extends Model
{
    public function salida()
    {
        return $this->belongsTo('App\Salida');
    }

    public function cliente()
    {
        return $this->hasOne('App\Cliente');
    }

    protected $fillable = [
    'numero', 'despachadoPor','rutaArchivo', 'cliente_id',
    ];
}
