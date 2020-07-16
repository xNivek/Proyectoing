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
                        {{  Form::label('parametro1', 'Ingrese nombre del trabajo de titulaión')    }}
                        {{  Form::text('nombre', null, ['class' => 'form-control'])    }}
                    </div>
                    <!--
                    <div class="form-group">
                        {{  Form::label('parametro2', 'Ingrese nombre del profesor guía')    }}
                        {{  Form::text('profesor', null, ['class' => 'form-control'])    }}
                    </div>
                    -->
                    <div class="form-group">
                        {{  Form::submit('guardar', ['class' => 'btn btn-primary '])    }}
                    </div>

                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection