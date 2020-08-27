<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <header style="background-color: #1D5E6B">
            @if (Route::has('login'))
                    <div class="content">
                        @auth
                        <button class="top-right btn btn-primary btn-lg" style="background-color:#F08428; height:35px; width:100px; margin-top:11px"><a href="{{ url('/home') }}" class="links" style="color:#f4f4f4">Home</a></button>
                            <div class="title m-b-md" style="color:#f4f4f4">
                                Bitacora web
                            </div>
                            <!-- Vista para rol administrador-->
                            @if(Auth::user()!=null && Auth::user()->rol=='Administrador' )
                                <div class="links">
                                    
                                <button class="btn btn-primary btn-lg" style="background-color:#F08428; height:35px; width:100px; margin-top:11px"><a href="http://127.0.0.1:8000/user" class="links" style="color:#f4f4f4">Usuarios</a></button>
                                
                                </div>
                            @endif
                                    <!-- Vista para rol secretaria-->
                                    @if(Auth::user()!=null && (Auth::user()->rol=='Secretaria' || Auth::user()->rol=='Encargado de titulacion'))
                                        <div class="links">
                                        <button class="btn btn-primary btn-lg" style="background-color:#F08428; height:35px; width:100px; margin-top:11px"><a href="http://127.0.0.1:8000/bitacora" class ="links" style="color:#f4f4f4">Bitacora</a></button>
                                        </div>
                                    @endif
                                        <!-- Vista para rol de estudiante-->
                                        @if(Auth::user()!=null && Auth::user()->rol=='Estudiante tesista' )
                                            <div class="links">
                                            <button class="btn btn-primary btn-lg" style="background-color:#F08428; height:35px; width:100px; margin-top:11px"><a href="http://127.0.0.1:8000/indexEstudiante" class="links" style="color:#f4f4f4">Revisa tu bitácora</a></button>
                                            </div>
                                        @endif
                                            <!-- Vista para rol de Profesor guía-->
                                            @if(Auth::user()!=null && Auth::user()->rol=='Profesor guia' )
                                                <div class="links">
                                                <button class="btn btn-primary btn-lg" style="background-color:#F08428; height:35px; width:100px; margin-top:11px"><a href="http://127.0.0.1:8000/indexProfesor" class="links" style="color:#f4f4f4">Trabajos de titulo a cargo</a></button>
                                                </div>
                                            @endif
                            </div>
                        @else
                            <!--<a href="{{ route('login') }}">Login</a>-->
                            <button class="top-right btn btn-primary btn-lg" style="background-color:#F08428; height:35px; width:100px; margin-top:11px"><a href="{{ route('login') }}" class="links" style="color:#f4f4f4" >Iniciar sesión</a></button>
                            <div class="title m-b-md" style="color:#f4f4f4">
                                Bitacora web
                            </div>
                        @endauth
                    </div>
                @endif
        
        </header>

        <div class="flex-center position-ref full-height">
            

           
        </div>
    </body>
</html>
