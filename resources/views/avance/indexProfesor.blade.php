@extends('layouts.app')

<!--Hereda código de app.blade-->
@section('content')
    @if(Auth::user()!=null && Auth::user()->rol=='Estudiante tesista' || Auth::user()->rol=='Profesor guia')   
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <div class="card-header">
                            Lista de avances PROFESOR
                            
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thread>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre avance</th>
                                    <th>Usuario</th>
                                    <th>Fecha Creación</th>
                                    <th>Fecha Actualización</th>
                                    <th>Acciones</th>
                                </tr>
                            </thread>

                            <tbody>
                                @foreach($avances as $avance)
                                    <tr>
                                        <td>{{$avance->id}}</td>
                                        <td>{{$avance->nombre}}</td>
                                        <td>{{App\User::find($avance->user_id)->name}}</td>
                                        <td>{{$avance->created_at}}</td>
                                        <td>{{$avance->updated_at}}</td>

                                        <td >
                                            <a href="{{ route('avance.showProfesor', $avance->id) }}" class="btn btn-sm btn-primary">Ver</a>
                                            <a href="{{route('indexComentario', $avance->id)}}" class="btn btn-sm btn-primary">Comentar</a>
                                            
                                            <!--<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#myModal"  onclick="saveNameFile('{{$avance->nombre}}_bitacora_{{$avance->bitacora_id}}_avance_{{$avance->id}}','{{$avance->id}}')">Subir Archivo</button>-->
                                            @if ($avance->ruta != NULL)

                                                <a href="{{ $avance->ruta }}" download class="btn btn-sm btn-primary">Descargar</a>

                                            @endif
                                            
                                            
                                            <input id="id" type="hidden" class="form-control" name="id" value="" >
                                            {!! Form::model($avance,['route' => ['avance.update', $avance->id],'method'=>'PUT'])!!}
                                                @include('avance.partials.form')

                                                {{ Form::hidden('user_id', auth()->user()->id)}}
                                                <input id="ruta_{{$avance->id}}" type="hidden" class="form-control" name="ruta" value="" >
                                                <button id="btn_{{$avance->id}}" style="display:none" class="btn btn-sm btn-primary" type="submit" hidden></button>
                                            {!!Form::close()!!}
                                        </td>
                                        <td>
                                            
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Subir Archivo</h4>
                            <small class="font-bold">¿Esta segur@ que desea subir un archivo? (Si ya existe un archivo este lo reemplazara)</small>
                        </div>
                        <div class="modal-body">
                            <input id="idTxt" type="hidden"></input>
                            <form id="myAwesomeDropzone" action="../upload.php" class="dropzone">
                                <div class="dz-message" data-dz-message><span>Desliza tu documento aqui o haz click para abrir el buscador...</span></div>
                                <div class="fallback">
                                    <input name="file" type="file" id="example-file"/>
                                </div>
                            </form>                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="cleanFileUpload()">Cerrar</button>
                        </div>
                    </div>
                
                </div>
            </div>

    <script type="text/javascript">
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5,
            acceptedFiles: ".pdf,.docx,.doc",
            uploadMultiple: false,
            addRemoveLinks: true,
            renameFile: function (file) {
                var extension = file.name.split('.');
                var pos = extension.length-1;
                var name = document.getElementById('idTxt').value+'.';
                var myFileName = name+extension[pos];
                var idAvance = document.getElementById('id').value;
                document.getElementById('ruta_'+idAvance).value='http://localhost:8000/Archivos/'+myFileName;
                document.getElementById('btn_'+idAvance).click();
                return myFileName;
            },
            removedfile: function(file) {
                var name = file.upload.filename;    
                
                $.ajax({
                    type: 'POST',
                    url: '../upload.php',
                    data: {name: name,request: 2},
                    sucess: function(data){
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        };
        
        function saveNameFile(fileName,id)
        {
            document.getElementById('idTxt').value = fileName;
            document.getElementById('id').value = id;
        }

        function cleanFileUpload() {
            document.location.reload(true);
        }
    </script>
    <script type="text/javascript">
        
    </script>
    @else <!--fin de la validacion-->
        <div> 
            <h1> usted no deberia estar aquí </h1>
        </div>
    @endif

@endsection
