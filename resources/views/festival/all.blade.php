@extends('welcome')


@section('menu')
    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li>Portfolio</li>
                </ul>
            </div>
            <form method="GET" action="{{ action('FestivalsController@cambio') }}">
                <button type="submit">Mostrar de 2 en 2</button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="text-center">Festivales:</h1>
            </div>
        </div>
    </div>
    <section id="portfolio">
        <div class="row">
            <div class="container">
                <div class="center col-md-2">
                    <ul class="portfolio-filter text-center">
                        <li><a class="btn btn-default active" href="#" data-filter="*">All Genres</a></li>
                        <!--div class="btn-group" data-toggle="buttons"-->
                        @forelse($genres as $genre)
                            <li><a class="btn btn-default" type="checkbox" autocomplete="off" value="{{$genre->genre}}"
                                   href="{{action('FestivalsController@init')}}">{{$genre->genre}}</a></li>
                        @empty
                            <h2>No hay géneros en la BD</h2>
                    @endforelse
                    <!--/div-->
                    </ul><!--/#portfolio-filter-->
                </div>
                <div class="col-md-10">
                    <div class="portfolio-items">
                        @forelse($festivals as $festival)
                            <div class="portfolio-item festival-{{$festival->id}} col-md-3">
                                <div class="recent-work-wrap">
                                    <a class="preview" href="{{$festival->pathLogo}}" rel="prettyPhoto">
                                        <img class="img-responsive" src="{{$festival->pathLogo}}" alt="400" width="400"></a>
                                    <div class="overlay">
                                        <div class="recent-work-inner">
                                            <h3><a href="#">
                                                    <ul>
                                                        <li>
                                                            <a href="/festival/{{$festival->permalink}}">{{$festival->name}}</a>
                                                        </li>
                                                    </ul>
                                                </a></h3>
                                            <p>Algo de {{$festival->date}} con el genero </p>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/.portfolio-item-->
                        @empty
                            <h2>No hay festivales en la BD</h2>
                        @endforelse
                    </div>
                </div>
                <div class="pagination pagination-lg .text-center">

                    {{ $festivals->links() }}
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
@endsection