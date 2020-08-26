@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')
    @if(Auth::user()!=null && Auth::user()->rol=='Profesor guia')   
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-header">
                            Lista de trabajos
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thread>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre del trabajo</th>
                                    <th>Creador</th>
                                    <th>Acciones</th>
                                </tr>
                            </thread>

                            <tbody>
                                @foreach($bitacoras as $bitacora)
                                    @if(Auth::user()->id==$bitacora->profesor1_id || Auth::user()->id==$bitacora->profesor2_id)
                                        <tr>
                                            <td>{{$bitacora->id}}</td>
                                            <td>{{$bitacora->nombre}}</td>  
                                            <td>{{App\User::find($bitacora->user_id)->name}}</td>
                                            <td >
                                                <a href="{{ route('bitacora.show', $bitacora->id) }}" class="btn btn-sm btn-primary">Ver</a>
                                                <!-- este avance tiene que ser una ruta a una vista dedicada solo al profesor-->
                                                <!--<a href="{{ route('indice', $bitacora->id) }}" class="btn btn-sm btn-primary">Avance</a>-->
                                            </td>  
                                        </tr>
                                    @endif 
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
