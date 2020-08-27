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
                <p><strong>Nombre del avance: </strong>{{$avance->nombre}}</p>
                <p><strong>Descripción: </strong>{{$avance->texto}}</p>
                <p><strong>Usuario que creo el avance: </strong>{{App\user::find($avance->user_id)->name}}</p>               
                </div>

            </div>
                <a href="{{route('bitacora.indexProfesor') }}"class= "btn btn-primary">Volver</a>
        </div>
    </div>
</div>

@endsection