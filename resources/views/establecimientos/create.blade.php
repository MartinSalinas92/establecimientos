@extends('layouts.app')

@section('content')

    <h1 class="text-center"> Crea Establecimientos</h1>

    <div class="row justify-content-center mt-5 ">

        <form class="col-md-9 col-xs-12 card card-body">

            <fieldset class="border p-4">
                <legend class="text-primary"> Nombre, Categoria e Imagen Principal</legend>
                <div class="form-group">
                    <label> Nombre</label>

                    <input
                        type="text"
                        placeholder="nombre del establecimiento"
                        class="form-control"
                        name="nombre"
                        id="nombre"
                        value="{{old('nombre')}}"

                    />

                    @error('nombre')
                        <span class="invalid-feedback d-block" role="alert">

                            <strong>{{$message}}</strong>
                        </span>

                    @enderror
                </div>

                <div class="form-group">

                    <label> Categorias</label>

                    <select
                        name="categoria"
                        class="form-control @error('error') is-invalid @enderror"
                        id="categoria"
                        required

                    >
                        <option disabled-selected> Seleccionar</option>

                        @foreach ($categoria as $item)
                            <option
                            value="{{ $item->id}}"
                            {{old('categoria')==$item->id ? 'selected' : ''}}


                                >{{$item->nombre}}

                            </option>

                        @endforeach

                    </select>




                </div>

                <div class="form-group">
                    <label for=""> Imagen Principal</label>

                    <input
                    type="file"
                    id="imagen_principal"
                    class="form-control @error('error') is-invalid @enderror"
                    name="imagen_principal"
                    value="{{old('imagen_principal')}}"


                    />

                    @error('imagen_principal')

                        <span class="invalid-feedback d-block" role="alert">

                            <strong>{{$message}}</strong>


                        </span>

                    @enderror


                </div>



            </fieldset>

            <fieldset class="border p-4">

                <legend class="text-primary"> Ubicacion:</legend>

                    <div class="form-group">
                        <label for="formBuscador"> Coloca la direccion del Establecimiento</label>

                            <input
                                id="formbuscador"
                                type="text"
                                placeholder="Calle del negocio o Establecimiento"
                                class="form-control"

                            />

                            <p class="text-secondary mt-5 mb-5 text-center">EL asistente colocara una direccion estimada, mueve el pin hacia el lugar correcto</p>
                    </div>

            </fieldset>



        </form>


    </div>

@endsection
