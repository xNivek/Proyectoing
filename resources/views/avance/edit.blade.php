@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="card">

                <div class="card-header">
                    Editar avance
                </div>

                <div class="card-body">

                    {!! Form::model($avance,['route' => ['avance.update', $avance->id],'method'=>'PUT'])!!}
                    @include('avance.partials.form')

                    {{ Form::hidden('user_id', auth()->user()->id)}}

                    <div class="form-group">
                        {{  Form::label('parametro', 'Ingrese nombre del avance')    }}
                        {{  Form::text('nombre', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro1', 'Descripción')    }}
                        {{  Form::text('texto', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::submit('guardar', ['class' => 'btn btn-primary '])    }}
                        <a href="{{ route('bitacora.indexEstudiante') }}" style="float:right" class= "btn btn-primary">Volver</a>
                    </div>

                {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection