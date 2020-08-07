@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                        <div class="card-header">
                            Registre profesor guía
                        </div> 

                        <select class="form-control" name="profesor1_id">
                            @foreach($profesores as $profesor)
                                <option value="{{$profesor->id}}">{{$profesor->name}}</option>
                            @endforeach
                        </select>


                    </div>
                    

                    <div class="form-group">
                        <div class="card-header">
                            Registre profesor guía
                        </div> 

                        <select class="form-control" name="profesor2_id">
                            <option value="100">Seleccione otro profesor guia si tiene</option>
                            @foreach($profesores as $profesor)
                                <option value="{{$profesor->id}}">{{$profesor->name}}</option>
                            @endforeach
                        </select>

                    </div>


                    <div class="form-group">
                        <div class="card-header">
                            Ingrese estudiante tesista
                        </div> 

                        <select class="form-control" name="tesista1_id">
                            @foreach($tesistas as $tesista)
                                <option value="{{$tesista->id}}">{{$tesista->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <div class="card-header">
                            Ingrese estudiante tesista
                        </div> 
                        <select class="form-control" name="tesista2_id">
                            <option value="101">Seleccione otro tesista si tiene</option>
                            @foreach($tesistas as $tesista)
                                <option value="{{$tesista->id}}">{{$tesista->name}}</option>
                            @endforeach
                        </select>
                    
                    </div>

                    <div class="form-group">
                        <div class="card-header">
                            Ingrese estudiante tesista
                        </div> 
                        <select class="form-control" name="tesista3_id">
                            <option value="102">Seleccione otro tesista si tiene</option>
                            @foreach($tesistas as $tesista)
                                <option value="{{$tesista->id}}">{{$tesista->name}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <div class="card-header">
                            Ingrese estudiante tesista
                        </div> 
                        
                        <select class="form-control" name="tesista4_id">
                            <option value="103">Seleccione otro tesista si tiene</option>
                            @foreach($tesistas as $tesista)
                                <option value="{{$tesista->id}}">{{$tesista->name}}</option>
                            @endforeach
                        </select>
                        

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