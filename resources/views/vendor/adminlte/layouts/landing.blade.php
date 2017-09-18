<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
        <title>SIGEx | HOME</title>
        <!-- Custom styles for this template -->
        <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    </head>
    <body data-spy="scroll" data-target="#navigation">
        <div id="app" v-cloak>
            <!-- Fixed navbar -->
            <div id="navigation" class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">SIGEx</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#home" class="smoothScroll">{{ trans('adminlte_lang::message.home') }}</a></li>
                            <li><a href="#contact" class="smoothScroll">{{ trans('adminlte_lang::message.contact') }}</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Auth::guest())
                            <li><a href="{{ url('usuarios/log') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                            <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                            @else
                            <li><a href="/home">{{ Auth::user()->name }}</a></li>
                            @endif
                        </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
                <section id="home" name="home">


                        <div id="carousel-id" class="carousel slide" data-ride="carousel">
                            
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="2" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="3" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="4" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="5" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="6" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="7" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="8" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="9" class=""></li>
                                <li data-target="#carousel-id" data-slide-to="10" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{asset('img/currs.jpg')}}" style="width: 100%;height: 600px;">
                                    <div class="container">
                                        <div class="carousel-caption" style="color: #fff;">
                                            <h1 style="color: #fff;">Deportes, artes y cultura</h1>
                                            <p>Inscribite y libera tus actividad extracurricular que mas disfrutes</p>
                                            <p class="text-center"><a class="btn btn-lg btn-primary" href="#" role="button">Registrate</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{asset('img/futbol-1.jpg')}}" style="width: 100%;height: 600px;">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>Fútbol</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{asset('img/chess.jpg')}}" style="width: 100%;height: 600px;">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>Ajedréz</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{asset('img/boxeo.jpg')}}" style="width: 100%;height: 600px;">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>Boxeo</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{asset('img/artesP.jpg')}}" style="width: 100%;height: 600px;">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>Artes Plásticas</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{asset('img/atletismo.jpg')}}" style="width: 100%;height: 600px;">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>Atletismo</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{asset('img/danza.jpg')}}" style="width: 100%;height: 600px;">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>Danza</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{asset('img/musica.jpg')}}" style="width: 100%;height: 600px;">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>Música</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{asset('img/basquetbol.jpg')}}" style="width: 100%;height: 600px;">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>Básquetbol</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{asset('img/teatro.jpg')}}" style="width: 100%;height: 600px;">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>Teatro</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="{{asset('img/volibol.jpg')}}" style="width: 100%;height: 600px;">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <h1>Volleyball</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                    
                </div>
                </div> <!--/ .container -->
                </div><!--/ #headerwrap -->
            </section>
            
            <section id="contact" name="contact">
                <div id="footerwrap">
                    <div class="container">
                        <div class="col-lg-5">
                            <h3>{{ trans('adminlte_lang::message.address') }}</h3>
                            <p>
                                Dirección del instituto,<br/>
                                Municipio,<br/>
                                Estado<br/>
                                México
                            </p>
                        </div>
                        <div class="col-lg-7">
                            <h3>{{ trans('adminlte_lang::message.dropus') }}</h3>
                            <br>
                            <form role="form" action="#" method="post" enctype="plain">
                                <div class="form-group">
                                    <label for="name1">{{ trans('adminlte_lang::message.yourname') }}</label>
                                    <input type="name" name="Name" class="form-control" id="name1" placeholder="{{ trans('adminlte_lang::message.yourname') }}">
                                </div>
                                <div class="form-group">
                                    <label for="email1">{{ trans('adminlte_lang::message.emailaddress') }}</label>
                                    <input type="email" name="Mail" class="form-control" id="email1" placeholder="{{ trans('adminlte_lang::message.enteremail') }}">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('adminlte_lang::message.yourtext') }}</label>
                                    <textarea class="form-control" name="Message" rows="3"></textarea>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-large btn-success">{{ trans('adminlte_lang::message.submit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <div id="c">
                    <div class="container">
                        <p>
                            Sistema de Gestión Curricular Escolar (SIGEx) Copyright &copy; 2017 <br>Nombre de la institucion educativa
                        </p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{ url (mix('/js/app-landing.js')) }}"></script>
        <script>
        $('.carousel').carousel({
        interval: 3500
        })
        </script>
    </body>
</html>