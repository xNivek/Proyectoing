@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')
    <!--validacion para que solo entre el administrador-->
    @if(Auth::user()!=null && Auth::user()->rol=='Administrador' )
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-2">
                    <div class="card">
                        <div class="card-header">
                            Lista de usuarios
                            <a href="{{route('user.create')}}" style="float:right" class="btn bn-sm btn-primary">Crear</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thread>
                                <tr>
                                    <th>ID</th>
                                    <th>nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Password</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                            </thread>

                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->rol}}</td>
                                        <td><input type="password" value="{{$user->password}}" readonly style="border:none"/></td><!-- esto es para ponerle los puntitos al password -->
                                        <td>{{$user->status}}</td>
                                        <td>                       
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @else 
    <!--fin de la validacion-->
        <div> 
            <h1> usted no deberia estar aquí </h1>
        </div>
    @endif
@endsection
