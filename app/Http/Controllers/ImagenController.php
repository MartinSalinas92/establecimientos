<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    //
    public function store(Request $request){

        //leer imagen donde se va almacenar

        $ruta_imagen=$request->file('file')->store('establecimientos', 'public');

        //rezise a la imagen
        $imagen=Image::make(public_path("storage/{$ruta_imagen}"))->fit(800,450);

        $imagen->save();

        //Almacenar en la base de datos

        $imagenDB= new Imagen;
        $imagenDB->id_establecimiento= $request['uuid'];
        $imagenDB->ruta_imagen =$ruta_imagen;
        $imagenDB->save();

        //Retornar Respuesta
        $respuesta=[
            'archivo'=>$ruta_imagen
        ];

        return response()->json($respuesta);

    }

    public function destroy(Request $request){


        //capturamos el request que viene del dropzones.js

        $imagen=$request->get('id');

        //borrar imagen de la carpeta storage

        if(File::exists('storage/establecimientos/'.$imagen)){
            File::delete('storage/establecimientos/'.$imagen);
        }


        $eliminar=[
            "mensaje"=> "ha sido eliminado",
            "imagen" => $imagen
        ];

        //eliminar de la base de datos

         Imagen::where('ruta_imagen', '=', $imagen)->delete();


        return response()->json($eliminar);

    }
}
