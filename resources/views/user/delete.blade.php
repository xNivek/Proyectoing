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
                                
                                <!--se agrego 15-07 es visibilidad cambio de estado-->
                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    <label for="status" class="col-md-4 control-label">Estado</label>

                                    <div class="col-md-6">
                                        <select class= "form-control" name="status" id="status">
                                
                                             @if ($user->status=='VISIBLE')
                                                <option value="VISIBLE" selected>VISIBLE</option>
                                            @else
                                                <option value="VISIBLE">VISIBLE</option>
                                            @endif

                                            @if ($user->status=='NO VISIBLE')
                                                <option value="NO VISIBLE" selected>NO VISIBLE</option>
                                            @else
                                                <option value="NO VISIBLE">NO VISIBLE</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <!--se agrego 15-07 es visibilidad cambio de estado--> 
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
    @else
    <!--fin de la validacion-->
        <div> 
            <h1> usted no deberia estar aquí </h1>
        </div>
    @endif

@endsection