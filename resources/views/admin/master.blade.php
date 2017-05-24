<!DOCTYPE html>
<html res="{{ App::setlocale(session('lang'))}}">
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{--<link rel="icon" href="../../favicon.ico">--}}

    <title>@yield('title') Awiten Fests Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{asset('css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">

    <!-- Awesome Bootstrap Checkbox -->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>

    <!--Bootstrap select -->
    <link href="{{asset('css/bootstrap-select.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap-select.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/i18n/defaults-es_ES.js')}}" type="text/javascript"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{action('AdminController@AvailableEntities')}}">Awiten Fests Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                         </a>
                         <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                          </ul>
                    </li>
                   @elseif (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">{{trans('translate.registro')}}</a></li>
                   @endif
                <li><a href="/">{{trans('translate.salirusuario')}}</a></li>
                
                {{--<li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Help</a></li>--}}
            </ul>
            {{--<form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Buscar...">
            </form>--}}
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li id="home" class="active"><a href="{{action('AdminController@AvailableEntities')}}">{{trans('translate.inicio')}}<span
                                class="sr-only">(current)</span></a></li>
                @if (Auth::check() && !Auth::user()->isAdmin())
                    <li id="profile"><a href="{{action('UserController@Edit')}}">{{trans('translate.perfil')}}</a></li>
                @endif
                @if (Auth::check() && Auth::user()->isAdmin())
                    <li id="users"><a href="{{action('AdminController@UsersList')}}">{{trans('translate.usuarios')}}</a></li>
                    <li id="genres"><a href="{{action('AdminController@GenresList')}}">{{trans('translate.generos')}}</a></li>
                @endif
                @if (Auth::check() && Auth::user()->isManager())
                    <li id="artists"><a href="{{action('AdminController@ArtistsList')}}">{{trans('translate.artistas')}}</a></li>
                @endif
                @if (Auth::check() && Auth::user()->isPromoter())
                    <li id="festivals"><a href="{{action('AdminController@FestivalsList')}}">{{trans('translate.festivales')}}</a></li>    
                    <li id="posts"><a href="{{action('AdminController@PostsList')}}">{{trans('translate.newsfests')}}</a></li>
                    <li id="photos"><a href="{{action('AdminController@PhotosList')}}">{{trans('translate.fotosfests')}}</a></li>
                @endif
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @section('content')
                <h1 class="page-header">{{trans('translate.inicio')}}</h1>
            @show
        </div>
    </div>
</div>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('js/jquery.prettyPhoto.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.isotope.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/functions.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]'
        });
    });

    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/έ/g, 'ε')
            .replace(/[ύϋΰ]/g, 'υ')
            .replace(/ό/g, 'ο')
            .replace(/ώ/g, 'ω')
            .replace(/ά/g, 'α')
            .replace(/[ίϊΐ]/g, 'ι')
            .replace(/ή/g, 'η')
            .replace(/\n/g, ' ')
            .replace(/á/g, 'a')
            .replace(/é/g, 'e')
            .replace(/í/g, 'i')
            .replace(/ó/g, 'o')
            .replace(/ú/g, 'u')
            .replace(/ê/g, 'e')
            .replace(/î/g, 'i')
            .replace(/ô/g, 'o')
            .replace(/è/g, 'e')
            .replace(/ï/g, 'i')
            .replace(/ü/g, 'u')
            .replace(/ã/g, 'a')
            .replace(/õ/g, 'o')
            .replace(/ç/g, 'c')
            .replace(/ì/g, 'i')
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }
</script>
</body>
</html>
