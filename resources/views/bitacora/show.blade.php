@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Ver trabajo
                    <a href="" style="float:right" class= "btn btn-primary">Editar</a>
                </div>

                <div class="card-body">
                <p><strong>Nombre del trabajo: </strong>{{$bitacora->nombre}}</p>
                <p><strong>Nombre del profesor guía: </strong>{{$bitacora->profesor}}</p>
                <p><strong>Usuario que creo el trabajo: </strong>{{App\User::find($bitacora->user_id)->name}}</p>
                </div>

            </div>
                <a href="{{ route('bitacora.index') }}"class= "btn btn-primary">Volver</a>
        </div>
    </div>
</div>

@endsection