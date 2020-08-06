@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        Lista de avances
                        <a href="{{route('crear',$bitacora_id)}}" style="float:right" class="btn bn-sm btn-primary">Crear</a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thread>
                            <tr>
                                <th>ID</th>
                                <th>Nombre avance</th>
                                 <th>Usuario</th>
                                 <th>Fecha Creación</th>
                                 <th>Fecha Actualización</th>
                                <th>Acciones</th>
                            </tr>
                        </thread>

                        <tbody>
                            @foreach($avances as $avance)
                                <tr>
                                    <td>{{$avance->id}}</td>
                                    <td>{{$avance->nombre}}</td>
                                    <td>{{App\User::find($avance->user_id)->name}}</td>
                                    <td>{{$avance->created_at}}</td>
                                    <td>{{$avance->updated_at}}</td>

                                    <td >
                                        <a href="{{ route('avance.show', $avance->id) }}" class="btn btn-sm btn-primary">Ver</a>
                                        <a href="{{ route('avance.edit', $avance->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                        {!!Form::open(['route'=>['avance.destroy',$avance->id],'method'=>'DELETE'])!!}
                                            <button class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>
                                        {!!Form::close()!!}

                                    </td>
                                    <td>
                                        
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
