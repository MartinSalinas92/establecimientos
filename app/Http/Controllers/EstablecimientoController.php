<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Establecimiento;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class EstablecimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categoria= Categoria::all();

       // return $categoria;

        return view('establecimientos.create', compact('categoria'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {





        $data=$request->validate([
            'nombre' => 'required',
            'imagen_principal'=>'required|image',
            'direccion'=>'required',
            'telefono'=>'required|numeric',
            'descripcion'=>'required|min:50',
            'apertura'=>'date_format:H:i',
            'cierre'=>'date_format:H:i|after:apertura',
            'uuid'=>'required|uuid',
            'categoria'=> 'required|exists:App\Models\Categoria,id'
        ]);

        //guardar la imagen
        $ruta_image=$request['imagen_principal']->store('principal', 'public');

        //Rezise a la imagen
        $imagen=Image::make(public_path("storage/{$ruta_image}"))->fit(800,450);
        $imagen->save();

        //guardar en la base de datos

        $guardar= new Establecimiento($data);
        $guardar->imagen_principal= $ruta_image;
        $guardar->categoria_id= $data['categoria'];
        $guardar->user_id= Auth::user()->id;
        $guardar->save();


        return back()->with('estado', 'tu informacion se almaceno correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Establecimiento $establecimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Establecimiento  $establecimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Establecimiento $establecimiento)
    {
        //
    }
}
