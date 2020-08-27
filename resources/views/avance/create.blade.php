@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">

                <div class="card-header">
                    CREAR NUEVO AVANCE
                </div>

                <div class="card-body">
                
                {!! Form::open(['route' => ['avance.store']])!!}

                    {{ Form::hidden('user_id', auth()->user()->id)}}
                    {{ Form::hidden('bitacora_id', $bitacora_id)}}
                    

                    <div class="form-group">
                        {{  Form::label('parametro1', 'nombre del avance')    }}
                        {{  Form::text('nombre', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro2', 'descripción del avance')    }}
                        {{  Form::text('texto', null, ['class' => 'form-control'])    }}
                    </div>
        
                    <div class="form-group">
                        {{  Form::submit('guardar', ['class' => 'btn btn-primary '])    }}
                        <a href="{{route('bitacora.indexEstudiante')}}" style="float:right" class="btn bn-sm btn-primary">Volver</a>
                    </div>

                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection