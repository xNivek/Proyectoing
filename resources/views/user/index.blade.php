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
                                    <th>Acción</th>
                                </tr>
                            </thread>

                            <tbody>
                            
                                
                                @foreach($users as $user)
                                    @if ($user->status == 'VISIBLE')
                                        <tr>
                                        
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->rol}}</td>
                                            <td><input type="password" value="{{$user->password}}" readonly style="border:none"/></td><!-- esto es para ponerle los puntitos al password -->
                                            <td>                       
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                                <form action="{{action('UserController@destroy', $user->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input name="_method" type="hidden" value="DELETE">
                                    
                                                    <button id="btn_{{$user->id}}" style="display:none" class="btn btn-sm btn-primary" type="submit">Eliminar</button>
                                                </form>
                                                <button type="button" class="btn btn-sm btn-danger" onclick="saveIdBtn('btn_{{$user->id}}')" data-toggle="modal" data-target="#myModal">Eliminar</button>
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
       <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Eliminar</h4>
                        <small class="font-bold">¿Esta segur@ que desea eliminar?</small>
                    </div>
                    <div class="modal-body">
                        <p><strong>Importante:</strong> Al eliminar un usuario de la tabla, no podra acceder a su informacion por este medio, sin embargo su informacion permanecera en la base de datos.</p>
                        <input id="idTxt" type="hidden"></input>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="doClickDelete()">Eliminar</button>
                    </div>
                </div>
            
            </div>
        </div>
        <script>
            function saveIdBtn(id)
            {
                document.getElementById('idTxt').value = id;
            }

            function doClickDelete()
            {
                id = document.getElementById('idTxt');
                document.getElementById(id.value).click();
            }
        </script>
    @else 
    <!--fin de la validacion-->
        <div> 
            <h1> usted no deberia estar aquí </h1>
        </div>
    @endif
@endsection
