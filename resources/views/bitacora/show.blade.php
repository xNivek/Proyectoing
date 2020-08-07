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
                <p><strong>Nombre del profesor guía 1: </strong>{{App\User::find($bitacora->profesor1_id)->name}}</p>
                <p><strong>Rut del profesor guía 1: </strong>{{App\User::find($bitacora->profesor1_id)->rut}}</p>
                <p><strong>Nombre del profesor guía 2: </strong>{{$bitacora->profesor2}}</p>
                <p><strong>Rut del profesor guía 2: </strong>{{$bitacora->rutprofesor2}}</p>
                <p><strong>Nombre del estudiante 1: </strong>{{App\User::find($bitacora->tesista1_id)->name}}</p>
                <p><strong>Rut del estudiante 1: </strong>{{App\User::find($bitacora->tesista1_id)->rut}}</p>
                <p><strong>Carrera del estudiante 1: </strong>{{$bitacora->carreraestudiante1}}</p>
                <p><strong>Nombre del estudiante 2: </strong>{{$bitacora->estudiante2}}</p>
                <p><strong>Rut del estudiante 2: </strong>{{$bitacora->rutestudiante2}}</p>
                <p><strong>Carrera del estudiante 2: </strong>{{$bitacora->carreraestudiante2}}</p>
                <p><strong>Nombre del estudiante 3: </strong>{{$bitacora->estudiante3}}</p>
                <p><strong>Rut del estudiante 3: </strong>{{$bitacora->rutestudiante3}}</p>
                <p><strong>Carrera del estudiante 3: </strong>{{$bitacora->carreraestudiante3}}</p>
                <p><strong>Nombre del estudiante 4: </strong>{{$bitacora->estudiante4}}</p>
                <p><strong>Rut del estudiante 4: </strong>{{$bitacora->rutestudiante4}}</p>
                <p><strong>Carrera del estudiante 4: </strong>{{$bitacora->carreraestudiante4}}</p>
                <p><strong>Usuario que creo el trabajo: </strong>{{App\User::find($bitacora->user_id)->name}}</p>
                </div>

            </div>
                <a href="{{ route('bitacora.index') }}"class= "btn btn-primary">Volver</a>
        </div>
    </div>
</div>

@endsection