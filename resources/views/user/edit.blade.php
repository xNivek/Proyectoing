@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')
    <!--validacion para que solo entre el administrador-->
    @if(Auth::user()!=null && Auth::user()->rol=='Administrador' )
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Registro de usuario</div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('user.update',$user->id) }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nombre</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Correo eletrónico</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email}}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Seleccionar rol de usuario-->
                                <div class="form-group{{ $errors->has('rol') ? ' has-error' : '' }}">
                                    <label for="rol" class="col-md-4 control-label">Rol</label>

                                    <div class="col-md-6">
                                        <select class= "form-control" name="rol" id="rol">
                                            <!--El IF es paraa que marque el rol que tiene por asignacion al editar-->
                                            @if ($user->rol=='Administrador')
                                                <option value="Administrador" selected>Administrador</option>
                                            @else
                                                <option value="Administrador">Administrador</option>
                                            @endif

                                            @if ($user->rol=='Estudiante tesista')
                                                <option value="Estudiante tesista" selected>Estudiante tesista</option>
                                            @else
                                                <option value="Estudiante tesista">Estudiante tesista</option>
                                            @endif
                                            
                                            @if ($user->rol=='Profesor guia')
                                                <option value="Profesor guia" selected>Profesor guía</option>
                                            @else
                                                <option value="Profesor guia">Profesor guía</option>
                                            @endif

                                            @if ($user->rol=='Secretaria')
                                                <option value="Secretaria" selected>Secretaria</option>
                                            @else
                                                <option value="Secretaria">Secretaria</option>
                                            @endif

                                            @if ($user->rol=='Encargado de titulacion')
                                                <option value="Encargado de titulacion" selected>Encargado de titulacion</option>
                                            @else
                                                <option value="Encargado de titulacion">Encargador de titulación</option>
                                            @endif

                                            
                                            
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="check" class="col-md-4 control-label">¿Desea cambiar la contraseña?</label>
                                    <label class="switch">
                                    <input type="checkbox" id="check" onclick="changePassword()">
                                    <span class="slider round"> </span>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="display:none" id="pass">
                                    <label for="password" class="col-md-4 control-label">Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group" style="display:none" id="passConfirm">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        {{ Form::hidden('_method','PUT')}}

                                        <button type="submit" class="btn btn-primary" >
                                            Guardar
                                        </button>
                                        <a href="{{route('user.index')}}" style="float:right" class="btn bn-sm btn-primary">Volver</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function changePassword()
            {
                var check = document.getElementById('check');
                var pass=document.getElementById('pass');
                var pass2=document.getElementById('passConfirm');
                var pass3=document.getElementById('password');
                var pass4=document.getElementById('password-confirm');

                if (check.checked == true){
                    pass.style.display = "block";
                    pass2.style.display = "block";
                    pass3.required=true;
                    pass4.required=true;
                } else {
                    pass.style.display = "none";
                    pass2.style.display = "none";
                    pass3.required=false;
                    pass4.required=false;
                }
            }

        
        </script>
    @else
    <!--fin de la validacion-->
        <div> 
            <h1> usted no deberia estar aquí </h1>
        </div>
    @endif

@endsection