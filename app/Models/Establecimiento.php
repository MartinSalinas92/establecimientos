<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    protected $fillable=[
        'nombre',
        'imagen_principal',
        'direccion',
        'telefono',
        'descripcion',
        'apertura',
        'cierre',
        'uuid',
        'categoria_id',
        'user_id'
    ];

    public function categoriasestablecimientos(){

        return $this->belongsTo(Categoria::class, 'categoria_id');
    }


}
