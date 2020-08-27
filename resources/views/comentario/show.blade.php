@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
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
                <a href="{{ route('bitacora.indexEstudiante') }}"class= "btn btn-primary">Volver</a>
        </div>
    </div>
</div>

@endsection