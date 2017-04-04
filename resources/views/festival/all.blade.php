@extends('welcome')




@section('mainContent')
<div class="container">
    <div class="breadcrumb navbar-form">
            <form method="GET" action="{{ action('FestivalsController@cambio') }}">
                <button type="summit" class="btn btn-info">Mostrar de 2 en 2</button>
            </form>
            <form method="GET" action="{{ action('FestivalsController@ordenar') }}">
                <button type="summit" class="btn btn-info">Ordenar por fecha</button>
            </form>
            <form method="get" action="{{ action('FestivalsController@busqueda') }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="buscado">
                    <button type="summit" class="btn btn-warning">Enviar</button>
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
                        <li><a class="btn btn-default active" href="#" data-filter="*">All Genres</a></li>
                        <form method="get" action="{{ action('FestivalsController@busquedaPorGenero') }}">
                            <div class="[ col-xs-12 col-sm-6 ]">
                                @forelse($genres as $genre)
                                <div class="[ form-group ]">
                                    <input type="checkbox" name="{{$genre->genre}}" id="fancy-checkbox-success-{{$genre->genre}}" autocomplete="off" value="{{$genre->genre}}" />
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-success-{{$genre->genre}}" class="[ btn btn-success ]">
                                        <span class="[ glyphicon glyphicon-ok ]"></span>
                                        <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-success-{{$genre->genre}}" class="[ btn btn-success active ]">
                                            {{$genre->genre}}
                                        </label>
                                    </div>
                                </div>
                                @empty
                                    <h2>No hay géneros en la BD</h2>
                                @endforelse
                                <button type="summit" class="btn btn-warning">Enviar</button>
                             </div>
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
                                        <img class="img-responsive" src="{{$festival->pathLogo}}" alt="400" width="400"></a>
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
                <div class="pagination pagination-lg .text-center">

                    {{ $festivals->links() }}
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
@endsection

<h1>Festivales</h1>
@if(session('deleted'))
    <h3>El festival se ha borrado correctamente</h3>
@endif
<ul>
    @forelse($festivals as $festival)
        <li>
            <a href="/artist/{{$festival->permalink}}"> {{$festival->name}}</a>
        </li>
    @empty
        <h2>No hay festivales en la BD</h2>
    @endforelse
</ul>
<p>
    <input type="button" onclick="location.href='{{action('FestivalController@New')}}';" value="Nuevo festival"/>
    <input type="button" onclick="location.href='/';" value="Inicio"/>
</p>
