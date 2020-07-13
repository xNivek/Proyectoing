@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        Lista de trabajos
                        <a href="{{route('bitacora.create')}}" style="float:right" class="btn bn-sm btn-primary">Crear</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thread>
                            <tr>
                                <th>ID</th>
                                <th>Nombre del trabajo</th>
                                <th>Profesor guía</th>
                                <th>Usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thread>

                        <tbody>
                            @foreach($bitacoras as $bitacora)
                                <tr>
                                    <td>{{$bitacora->id}}</td>
                                    <td>{{$bitacora->nombre}}</td>
                                    <td>{{$bitacora->profesor}}</td>
                                    <td>{{App\User::find($bitacora->user_id)->name}}</td>
                                    <td>
                                        <a href="{{ route('bitacora.show', '$bitacora->id') }}" class="btn btn-sm btn-primary">Ver</a>                                   
                                        <a href="" class="btn btn-sm btn-primary">Editar</a>
                                        <a href="" class="btn btn-sm btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
