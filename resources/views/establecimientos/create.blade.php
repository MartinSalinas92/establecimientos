@extends('layouts.app')

@section('style')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
crossorigin=""/>

<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />



@endsection

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

                    <div class="form-group">

                        <div id="mapa" style="height: 400px"></div>

                    </div>

                    <div class="form-group">
                        <label for="direccion"> Direccion</label>

                            <input
                                type="text"
                                id="direccion"
                                class="form-control @error('error') is-invalid @enderror"
                                placeholder="barrio illia 2 mz 49 cs15"
                                value="{{old('direccion')}}"

                            />

                            @error('direccion')

                            <span class="invalid-feedback d-block" role="alert">

                                <strong>{{$message}}</strong>


                            </span>

                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="calle y altura"> Calle y altura</label>

                            <input
                                type="text"
                                id="calle_altura"
                                class="form-control @error('error') is-invalid @enderror"
                                placeholder="calle_altura"
                                value="{{old('barrio')}}"

                            />

                            @error('calle_altura')

                            <span class="invalid-feedback d-block" role="alert">

                                <strong>{{$message}}</strong>


                            </span>

                        @enderror

                    </div>

                    <input type="hidden" name="lat" id="lat" value="{{old('lat')}}">
                    <input type="hidden" name="lng" id="lng" value="{{old('lng')}}">

            </fieldset>

                    <fieldset class = "border p-4 mt-5 " >
                    <legend   class = "text-primary" > Información Establecimiento: </legend>
                        <div class = "form-group ">
                            <label  for = "nombre" > Teléfono </label >
                            <input
                                type = " tel "
                                class = " form-control @error ( ' telefono ' ) is-invalid   @enderror "
                                id = " telefono "
                                placeholder = "Teléfono Establecimiento"
                                name = " telefono "
                                value = "{{ old( 'telefono' )}} "
                                />


                                @error ( 'telefono' )
                                    <div class="feedback-inválido">
                                        {{$message}}
                                    </div >
                                @enderror
                        </div>


                        <div  class = "form-group" >
                            <label para = "nombre" > Descripción </label >
                            <textarea
                                class = "form-control @error ( ' descripcion ' ) is-invalid @enderror"
                                value = "descripcion"
                            > {{ old( 'descripcion' )}}
                            </textarea >

                                @error ( 'descripcion' )
                                    <div  class = "feedback-inválido" >
                                        {{ $message }}
                                    </div >
                                @enderror
                        </div >

                        <div  class = "form-group " >
                            <label  for = " nombre " > Hora Apertura: </label >
                            <input
                                type = " tiempo "
                                class = " form-control @error ( ' apertura ' ) is-invalid   @enderror "
                                id = " apertura "
                                name = " apertura "
                                value = " {{ old( ' apertura ' ) }} ">
                            @error ( ' apertura ' )
                                <div  class = "feedback-inválido ">
                                    {{ $message }}
                                </div >
                            @enderror
                        </div>

                        <div  class = " form-group " >
                            <label  for = " nombre " > Hora de cierre: </label >
                            <input
                                type = " tiempo "
                                class = " form-control @error ( 'cierre' ) is-invalid   @enderror "
                                id = " cierre "
                                name = " cierre "
                                value = " {{ old ( 'cierre' ) }} "
                            >
                            @error ( ' cierre ' )
                                <div  class = " feedback-inválido " >
                                    {{$message }}
                                </div >
                            @enderror
                        </div >
                    </fieldset >

                    <input type="hidden" id="uuid" value="{{ Str::uuid()->toString()}}">

                    <fieldset class = "border p-4 mt-5 " >
                        <legend   class = "text-primary" > Información Establecimiento: </legend>
                            <div class = "form-group ">
                                <label  for = "imagenes" > Imagenes </label >

                                    <div id="dropzoneEstablecimientos" class="dropzone form-control"></div>
                            </div>
                    </fieldset>

                    <input type="submit" class="btn btn-primary mt-3 d-block" value="Registrar Establecimientos">



                            </form>


                        </div>



                    @endsection

@section('script')

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

  <!--Cargar el folleto de Esri desde CDN -->
  <script src="https://unpkg.com/esri-leaflet" defer></script>
  <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous" >


</script>







@endsection
