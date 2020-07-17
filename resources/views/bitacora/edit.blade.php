@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">

                <div class="card-header">
                    Editar Titulo
                </div>

                <div class="card-body">
                    {!! Form::model($bitacora,['route' => ['bitacora.update', $bitacora->id],'method'=>'PUT'])!!}
                    @include('bitacora.partials.form')

                    {{ Form::hidden('user_id', auth()->user()->id)}}

                    <div class="form-group">
                        {{  Form::label('parametro', 'Ingrese nombre del trabajo de titulación')    }}
                        {{  Form::text('nombre', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro1', 'Estudiante a cargo')    }}
                        {{  Form::text('estudiante1', null, ['class' => 'form-control'])    }}
                        {{  Form::text('rutestudiante1', null, ['class' => 'form-control'])    }}
                        {{  Form::text('carreraestudiante1', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro2', 'Dejar en blanco para eliminar estudiante')    }}
                        {{  Form::text('estudiante2', null, ['class' => 'form-control'])    }}
                        {{  Form::text('rutestudiante2', null, ['class' => 'form-control'])    }}
                        {{  Form::text('carreraestudiante2', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro3', 'Dejar en blanco para eliminar estudiante')    }}
                        {{  Form::text('estudiante3', null, ['class' => 'form-control'])    }}
                        {{  Form::text('rutestudiante3', null, ['class' => 'form-control'])    }}
                        {{  Form::text('carreraestudiante3', null, ['class' => 'form-control'])    }}
                    </div>
                    <div class="form-group">
                        {{  Form::label('parametro4', 'Dejar en blanco para eliminar estudiante')    }}
                        {{  Form::text('estudiante4', null, ['class' => 'form-control'])    }}
                        {{  Form::text('rutestudiante4', null, ['class' => 'form-control'])    }}
                        {{  Form::text('carreraestudiante4', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro5', 'Ingrese nombre del profesor guía 1')    }}
                        {{  Form::text('profesor1', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro6', 'Ingrese el rut del profesor guía 1')    }}
                        {{  Form::text('rutprofesor1', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro7', 'Ingrese nombre del profesor guía 2')    }}
                        {{  Form::text('profesor2', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro8', 'Ingrese el rut del profesor guía 2')    }}
                        {{  Form::text('rutprofesor2', null, ['class' => 'form-control'])    }}
                    </div>

                  
                    <div class="form-group">
                        {{  Form::submit('guardar', ['class' => 'btn btn-primary '])    }}
                        <a href="{{ route('bitacora.index') }}" style="float:right" class= "btn btn-primary">Volver</a>
                    </div>

                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection