@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio de sesión</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!--formulario que sirve para realizar una redireccion de tipo post al logout, este es
                    invisible por lo tanto nunca se va a mostrar-->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                    </form>
                    
                    <!-- if que verifica que el usuario no es visible-->
                    @if(Auth::user()!=null && Auth::user()->status=='NO VISIBLE' )
                        
                        <!--carga la libreria de jquery (yicueri) para quee funcione el document.ready-->
                        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

                        <script>
                            //metodo que se ejecuta cuando se carga la pagina por primera vez 
                            //y dentro se coloco un metodo para ejecutar el form del logout
                            $(document).ready(function() {document.getElementById('logout-form').submit();});

                        </script>

                    @endif

                    Iniciaste sesión exitosamente!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
