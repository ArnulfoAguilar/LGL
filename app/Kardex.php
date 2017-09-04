<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{
	
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

    protected $fillable = [
        'producto_id', 'metodo',
    ];

    protected $table = 'kardexs';

}
