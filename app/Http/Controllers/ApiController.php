<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Establecimiento;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function categorias(){

        $categoria=Categoria::all();

        return response()->json($categoria);


    }

    public function categoria(Categoria $categoria){

        $establecimientos=Establecimiento::where('categoria_id', '=', $categoria->id)->with('categoriasestablecimientos')->get();

        return response()->json($establecimientos);

    }
}
