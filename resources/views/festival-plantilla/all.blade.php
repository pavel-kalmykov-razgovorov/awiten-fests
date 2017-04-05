@extends('welcome')


@section('mainContent')
    <div class="container">
        <div class="breadcrumb navbar-form">
            <form method="GET" action="{{ action('FestivalController@paginacionDeDosEnDos') }}">
              
                <button type="summit" class="btn btn-info">Mostrar de 2 en 2</button>
            </form>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Mostrar de 2 en 2</a></li>
                    <li><a href="#">Mostrar de 4 en 4</a></li>
                    <li><a href="#">Mostrar de 4 en 4</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                </ul>
            <form method="GET" action="{{ action('FestivalController@ordenar') }}">
                <button type="summit" class="btn btn-info">Ordenar por fecha</button>
            </form>
            <form method="get" action="{{ action('FestivalController@busqueda') }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="buscado">
                    <button type="summit" class="btn btn-warning">Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center" style="color: Black">Festivales:</h1>
            </div>
        </div>
    </div>
    <section id="portfolio">
        <div class="row">
            <div class="container">
                <div class="center col-md-2">
                    <ul class="portfolio-filter text-center">
                        <form class="text-left" method="get" action="{{ action('FestivalController@busquedaPorGenero') }}">
                            <!--div class="[ col-xs-2 col-sm-2 ]"-->
                            <div class="well-sm">Generos Musicales</div>
                                @forelse($genres as $genre)
                                    <div class="[ form-group ]">
                                        @if(!empty(session('generos-marcados')) && in_array($genre->id,session('generos-marcados')))
                                            <input type="checkbox" name="{{$genre->genre}}" id="fancy-checkbox-success-{{$genre->genre}}" autocomplete="off"  checked="checked" value="{{$genre->genre}}" />
                                        @else
                                        <input type="checkbox" name="{{$genre->genre}}" id="fancy-checkbox-success-{{$genre->genre}}" autocomplete="off" value="{{$genre->genre}}" />
                                        @endif
                                        <div class="[ btn-group ]">
                                            <label for="fancy-checkbox-success-{{$genre->genre}}"
                                                   class="[ btn btn-success ]">
                                                <span class="[ glyphicon glyphicon-ok ]"></span>
                                                <span> </span>
                                            </label>
                                            <label for="fancy-checkbox-success-{{$genre->genre}}"
                                                   class="[ btn btn-success active ]">
                                                {{$genre->genre}}
                                            </label>
                                        </div>
                                    </div>
                                @empty
                                    <h2>No hay géneros en la BD</h2>
                                @endforelse
                                <button type="summit" class="btn btn-warning">Busqueda por Genero</button>
                            <!--/div-->
                        </form>
                    </ul>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="center col-md-12">
                            <div class="portfolio-items">
                                @forelse($festivals as $festival)
                                    <div class="portfolio-item festival-{{$festival->id}} col-md-4 col-sm-6">
                                        <div class="recent-work-wrap">
                                            <a class="" href="{{$festival->pathLogo}}" rel="prettyPhoto">
                                                <img class="img-responsive" src="{{$festival->pathLogo}}" alt="400"
                                                     width="400"></a>
                                            <div class="overlay">
                                                <div class="recent-work-inner">
                                                    <div class="portfolio-caption">
                                                        <h3>
                                                            <a href="/festival/{{$festival->permalink}}">{{$festival->name}}</a>
                                                        </h3>
                                                        <p class="text-muted"> {{$festival->date}} </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--/.portfolio-item-->
                                @empty
                                    <h2>No hay festivales en la BD</h2>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
    <div class="text-center">
        <div class="pagination pagination-lg">
            {{ $festivals->links() }}
        </div>
    </div>
@endsection

