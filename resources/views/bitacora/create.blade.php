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
                        <input class="form-control" type="text" id="rut" name="rutprofesor1" required oninput="checkRut(this)" placeholder="Ingrese RUT"> 
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
                        {{  Form::label('parametro8', 'Ingrese carrera del estudiante 1')    }}
                        {{  Form::text('carreraestudiante1', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro9', 'Ingrese nombre del estudiante 2')    }}
                        {{  Form::text('estudiante2', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro10', 'Ingrese rut del estudiante 2')    }}
                        {{  Form::text('rutestudiante2', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametr11', 'Ingrese carrera del estudiante 2')    }}
                        {{  Form::text('carreraestudiante2', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro12', 'Ingrese nombre del estudiante 3')    }}
                        {{  Form::text('estudiante3', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro13', 'Ingrese rut del estudiante 3')    }}
                        {{  Form::text('rutestudiante3', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro14', 'Ingrese carrera del estudiante 3')    }}
                        {{  Form::text('carreraestudiante3', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro15', 'Ingrese nombre del estudiante 4')    }}
                        {{  Form::text('estudiante4', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro16', 'Ingrese rut del estudiante 4')    }}
                        {{  Form::text('rutestudiante4', null, ['class' => 'form-control'])    }}
                    </div>

                    <div class="form-group">
                        {{  Form::label('parametro17', 'Ingrese carrera del estudiante 4')    }}
                        {{  Form::text('carreraestudiante4', null, ['class' => 'form-control'])    }}
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

<script>

    function checkRut(rut) {
        // Despejar Puntos
        var valor = rut.value.replace('.','');
        // Despejar Guión
        valor = valor.replace('-','');
        
        // Aislar Cuerpo y Dígito Verificador
        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        
        // Formatear RUN
        rut.value = cuerpo + '-'+ dv
        
        // Si no cumple con el mínimo ej. (n.nnn.nnn)
        if(cuerpo.length < 7) { 
            rut.setCustomValidity("RUT Incompleto"); 
            return false;
        }
        
        // Calcular Dígito Verificador
        suma = 0;
        multiplo = 2;
        
        // Para cada dígito del Cuerpo
        for(i=1;i<=cuerpo.length;i++) {
        
            // Obtener su Producto con el Múltiplo Correspondiente
            index = multiplo * valor.charAt(cuerpo.length - i);
            
            // Sumar al Contador General
            suma = suma + index;
            
            // Consolidar Múltiplo dentro del rango [2,7]
            if(multiplo < 7){ 
                multiplo = multiplo + 1; 
            } 
            else{ 
                multiplo = 2;
            }
    
        }
        
        // Calcular Dígito Verificador en base al Módulo 11
        dvEsperado = 11 - (suma % 11);
        
        // Casos Especiales (0 y K)
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;
        
        // Validar que el Cuerpo coincide con su Dígito Verificador
        
        if(dvEsperado != dv) { 
            rut.setCustomValidity("RUT Inválido");
            $("#rut").attr('class', "form-control is-invalid");
            return false; 
        }
        $("#rut").attr('class', "");
        $("#rut").attr('class', "form-control");
        
        // Si todo sale bien, eliminar errores (decretar que es válido)
        rut.setCustomValidity('');
    }

</script>
