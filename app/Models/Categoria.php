<?php

namespace App\Models;

use App\Models\Establecimiento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    //Leer la function por slug con el metodo getRouteKeyName()

    public function getRouteKeyName(){

        //que retorne por slug

        return 'slug';
    }

    //Relacion de 1 : n de categorias a establecimientos

    public function establecimientos(){

        return $this->hasMany(Establecimiento::class);
    }
}
