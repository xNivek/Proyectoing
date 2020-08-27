@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Ver comentario
                    <!--<a href="{{ route('bitacora.index') }}" style="float:right" class= "btn btn-primary">Editar</a>-->
                </div>

                <div class="card-body">
                <p><strong>Nombre del comentario: </strong>{{$comentario->nombre}}</p>
                <p><strong>Descripción: </strong>{{$comentario->texto}}</p>
                <p><strong>Usuario que creo el comentario: </strong>{{App\user::find($comentario->user_id)->name}}</p>               
                </div>

            </div>
                @if(Auth::user()->rol=='Profesor guia')
                    <a href="{{ route('bitacora.indexProfesor') }}"class= "btn btn-primary">Volver</a>
                @elseif(Auth::user()->rol=='Estudiante tesista')  
                     <a href="{{ route('bitacora.indexEstudiante') }}"class= "btn btn-primary">Volver</a>  
                @endif     
        </div>
    </div>
</div>

@endsection