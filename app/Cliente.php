<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

	public function salida()
    {
        return $this->belongsTo('App\Salida');
    }

    protected $fillable = [
        'nombre', 'telefono_principal', 'telefono_secundario', 'contacto','direccion',
    ];
}
