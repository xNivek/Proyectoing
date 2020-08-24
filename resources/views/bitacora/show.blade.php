@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Ver trabajo
                    <!--<a href="{{ route('bitacora.index') }}" style="float:right" class= "btn btn-primary">Editar</a>-->
                </div>

                <div class="card-body">
                <p><strong>Nombre del trabajo: </strong>{{$bitacora->nombre}}</p>
                <p><strong>Nombre del profesor guía: </strong>{{App\User::find($bitacora->profesor1_id)->name}}</p>
                <p><strong>Rut del profesor guía: </strong>{{App\User::find($bitacora->profesor1_id)->rut}}</p>
                @if($bitacora->profesor2_id == NULL)
                    <!--<p><strong>Nombre del profesor: profesor no ingresado </strong></p>-->
                    @else
                        <p><strong>Nombre del profesor guía: </strong>{{App\User::find($bitacora->profesor2_id)->name}}</p>
                        <p><strong>Rut del profesor guía: </strong>{{App\User::find($bitacora->profesor2_id)->rut}}</p>
                    
                @endif
                
                
                <p><strong>Nombre del estudiante: </strong>{{App\User::find($bitacora->tesista1_id)->name}}</p>
                <p><strong>Rut del estudiante: </strong>{{App\User::find($bitacora->tesista1_id)->rut}}</p>
                <p><strong>Carrera del estudiante: </strong>{{App\User::find($bitacora->tesista1_id)->carrera}}</p>
                
                @if($bitacora->tesista2_id == NULL)
                    <!--<p><strong>Nombre del profesor: profesor no ingresado </strong></p>-->
                    @else
                        <p><strong>Nombre del estudiante: </strong>{{App\User::find($bitacora->tesista2_id)->name}}</p>
                        <p><strong>Rut del estudiante: </strong>{{App\User::find($bitacora->tesista2_id)->rut}}</p>
                        <p><strong>Carrera del estudiante: </strong>{{App\User::find($bitacora->tesista2_id)->carrera}}</p>
                @endif
               
                @if($bitacora->tesista3_id == NULL)
                    <!--<p><strong>Nombre del profesor: profesor no ingresado </strong></p>-->
                    @else
                        <p><strong>Nombre del estudiante: </strong>{{App\User::find($bitacora->tesista3_id)->name}}</p>
                        <p><strong>Rut del estudiante: </strong>{{App\User::find($bitacora->tesista3_id)->rut}}</p>
                        <p><strong>Carrera del estudiante: </strong>{{App\User::find($bitacora->tesista3_id)->carrera}}</p>
                @endif

                @if($bitacora->tesista4_id == NULL)
                    <!--<p><strong>Nombre del profesor: profesor no ingresado </strong></p>-->
                    @else
                        <p><strong>Nombre del estudiante: </strong>{{App\User::find($bitacora->tesista4_id)->name}}</p>
                        <p><strong>Rut del estudiante: </strong>{{App\User::find($bitacora->tesista4_id)->rut}}</p>
                        <p><strong>Carrera del estudiante: </strong>{{App\User::find($bitacora->tesista4_id)->carrera}}</p>
                @endif
                </div>

            </div>
                @if(Auth::user()->id==$bitacora->tesista1_id || Auth::user()->id==$bitacora->tesista2_id || Auth::user()->id==$bitacora->tesista3_id || Auth::user()->id==$bitacora->tesista4_id)
                    <a href="{{ route('bitacora.indexEstudiante') }}"class= "btn btn-primary">Volver</a>
                    @elseif(Auth::user()->id==$bitacora->profesor1_id || Auth::user()->id==$bitacora->profesor2_id)
                        <a href="{{ route('bitacora.indexProfesor') }}"class= "btn btn-primary">Volver</a>
                    @else
                        <a href="{{ route('bitacora.index') }}"class= "btn btn-primary">Volver</a>
                @endif
        </div>
    </div>
</div>

@endsection