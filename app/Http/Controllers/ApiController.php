<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Establecimiento;
use App\Models\Imagen;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        $establecimientos= Establecimiento::all();

        return response()->json($establecimientos);
    }
    public function categorias(){

        $categoria=Categoria::all();

        return response()->json($categoria);


    }

    public function categoria(Categoria $categoria){

        $establecimientos=Establecimiento::where('categoria_id', '=', $categoria->id)->with('categoriasestablecimientos')->take(10)->get();

        return response()->json($establecimientos);

    }

    //Mostrar los establecimientos seleccionado

    public function show(Establecimiento $establecimiento){

        $img=Imagen::where('id_establecimiento', '=', $establecimiento->uuid)->get();

        $establecimiento->imagenes= $img;

        return response()->json($establecimiento);

    }
}
