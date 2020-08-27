@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">

                <div class="card-header">
                    CREAR NUEVO COMENTARIO
                </div>

                <div class="card-body">
                
                {!! Form::open(['route' => ['comentario.store']])!!}

                    {{ Form::hidden('user_id', auth()->user()->id)}}
                    {{ Form::hidden('avance_id', $avance_id)}}
                    

                    <div class="form-group">
                        {{  Form::label('parametro1', 'nombre del Comentario')    }}
                        {{  Form::text('nombre', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        
                        {{  Form::label('parametro2', 'descripción del Comentario')    }}
                        {{  Form::text('texto', null, ['class' => 'form-control'])    }}
                    </div>
        
                    <div class="form-group">
                        {{  Form::submit('guardar', ['class' => 'btn btn-primary '])    }}
                        <a href="{{route('bitacora.indexProfesor')}}" style="float:right" class="btn bn-sm btn-primary">Volver</a>
                    </div>

                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection