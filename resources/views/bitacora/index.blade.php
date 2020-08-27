@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')
    @if(Auth::user()!=null && Auth::user()->rol=='Secretaria' )   
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
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
                                    <th>Creador</th>
                                    <th>Fecha Creación</th>
                                    <th>Fecha Actualización</th>
                                    <th>Acciones</th>
                                </tr>
                            </thread>

                            <tbody>
                                @foreach($bitacoras as $bitacora)
                                    <tr>
                                        <td>{{$bitacora->id}}</td>
                                        <td>{{$bitacora->nombre}}</td> 
                                        <td>{{$bitacora->created_at}}</td>
                                        <td>{{$bitacora->updated_at}}</td>
                                       
                                        <td>{{App\User::find($bitacora->user_id)->name}}</td>
                                        <td >
                                            <a href="{{ route('bitacora.show', $bitacora->id) }}" class="btn btn-sm btn-primary">Ver</a>
                                            <!--<a href="{{ route('indice', $bitacora->id) }}" class="btn btn-sm btn-primary">Avance</a>--> 
                                            <a href="{{ route('bitacora.edit', $bitacora->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            <a href="bitacora.destroy" class="btn btn-sm btn-danger">Finalizar</a>
                                        </td>  
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        @else <!--fin de la validacion-->
        <div> 
            <h1> usted no deberia estar aquí </h1>
        </div>
        @endif
@endsection
