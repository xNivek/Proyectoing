@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">

                <div class="card-header">
                    Crear nuevo rabajo de titulación
                </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'bitacora.store'])!!}

                    {{ Form::hidden('user_id', auth()->user()->id)}}

                    <div class="form-group">
                        {{  Form::label('parametro1', 'Ingrese nombre del trabajo de titulación')    }}
                        {{  Form::text('nombre', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro2', 'Ingrese nombre del profesor guía 1')    }}
                        {{  Form::text('profesor1', null, ['class' => 'form-control'])    }}
                    </div>
                    

                    <div class="form-group">
                        {{  Form::label('parametro3', 'Ingrese el rut del profesor guía 1')    }}
                        {{  Form::text('rutprofesor1', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro4', 'Ingrese nombre del profesor guía 2')    }}
                        {{  Form::text('profesor2', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro5', 'Ingrese el rut del profesor guía 2')    }}
                        {{  Form::text('rutprofesor2', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro6', 'Ingrese nombre del estudiante 1')    }}
                        {{  Form::text('estudiante1', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro7', 'Ingrese rut del estudiante 1')    }}
                        {{  Form::text('rutestudiante1', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro8', 'Ingrese nombre del estudiante 2')    }}
                        {{  Form::text('estudiante2', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro9', 'Ingrese rut del estudiante 2')    }}
                        {{  Form::text('rutestudiante2', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro10', 'Ingrese nombre del estudiante 3')    }}
                        {{  Form::text('estudiante3', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro11', 'Ingrese rut del estudiante 3')    }}
                        {{  Form::text('rutestudiante3', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro12', 'Ingrese nombre del estudiante 4')    }}
                        {{  Form::text('estudiante4', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro13', 'Ingrese rut del estudiante 4')    }}
                        {{  Form::text('rutestudiante4', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::submit('guardar', ['class' => 'btn btn-primary '])    }}
                        <a href="{{route('bitacora.index')}}" style="float:right" class="btn bn-sm btn-primary">Volver</a>
                    </div>

                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection