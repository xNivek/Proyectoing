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
    
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="content">
                    @auth
                        <a href="{{ url('/home') }}" class="top-right links">Home</a>
                        <div class="title m-b-md">
                            Bitacora web
                        </div>
                        <!-- Vista para rol administrador-->
                        @if(Auth::user()!=null && Auth::user()->rol=='Administrador' )
                            <div class="links">
                                
                                <a href="http://127.0.0.1:8000/user">Usuarios</a>
                            
                            </div>
                        @endif
                                <!-- Vista para rol secretaria-->
                                @if(Auth::user()!=null && (Auth::user()->rol=='Secretaria' || Auth::user()->rol=='Encargado de titulacion'))
                                    <div class="links">
                                        <a href="http://127.0.0.1:8000/bitacora">Bitacora</a>
                                    </div>
                                @endif
                                    <!-- Vista para rol de estudiante-->
                                    @if(Auth::user()!=null && Auth::user()->rol=='Estudiante tesista' )
                                        <div class="links">
                                            <a href=" ">Revisa tú bitacora</a>
                                        </div>
                                    @endif
                                        <!-- Vista para rol de Profesor guía-->
                                        @if(Auth::user()!=null && Auth::user()->rol=='Profesor guia' )
                                            <div class="links">
                                                <a href=" ">Trabajos de titulo a cargo</a>
                                            </div>
                                        @endif
                        </div>
                    @else
                        <!--<a href="{{ route('login') }}">Login</a>-->
                        <a href="{{ route('login') }}" class="top-right links">Iniciar sesión</a>
                        <div class="title m-b-md">
                            Bitacora web
                        </div>
                    @endauth
                </div>
            @endif

           
        </div>
    </body>
</html>
