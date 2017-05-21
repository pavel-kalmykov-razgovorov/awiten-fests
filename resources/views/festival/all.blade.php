@extends('welcome')

@section('mainContent')

    <div id="breadcrumb">
        <div class="container hidden-xs">
            <div class="breadcrumb">
                <div class="row">
                    <div class="col-md-12">
                        <form method="get" action="{{ action('FestivalController@busquedaConParametros') }}">
                            <div class="input-group add-on btn-group">
                                <div class="col col-md-3">
                                    <input type="text" class="form-control" name="buscado"
                                           placeholder="Introduce el festival">
                                </div>
                                <div class="col col-md-3">
                                    <select class="form-control" name="paginadoA">
                                        <option value="3"> 3 por pagina</option>
                                        <option value="6" selected>6 por pagina</option>
                                        <option value="9">9 por pagina</option>
                                    </select>
                                </div>
                                <div class="col col-md-3">
                                    <select class="form-control" name="ordenado">
                                        <option value="asc" selected>Fecha Asc</option>
                                        <option value="desc">Fecha Desc</option>
                                    </select>
                                </div>
                                <button type="summit" class="btn btn-warning"><i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if(count($festivals) != 0)
                    <h1 style="background-color:rgb(0,0,0);color:white; font-weight:bold; text-align:center">
                        Festivales</h1>
                @else
                    <div class="alert alert-danger">
                        <h1> No se han encontrado festivales.</h1>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if(count($festivals) != 0)
        <div class="row">
            <div class="container">
                <div class="center col-md-2 hidden-xs">
                    <ul class="portfolio-filter text-center">
                        <form class="text-left" method="get"
                              action="{{ action('FestivalController@busquedaPorGenero') }}">
                            <div class="well-sm">Generos Musicales</div>
                            @forelse($genres as $genre)
                                <div class="[ form-group ]">
                                    @if(!empty(session('generos-marcados-festival')) && in_array($genre->id,session('generos-marcados-festival')))
                                        <input type="checkbox" name="{{$genre->name}}"
                                               id="fancy-checkbox-success-{{$genre->name}}" autocomplete="off"
                                               checked="checked" value="{{$genre->name}}"/>
                                    @else
                                        <input type="checkbox" name="{{$genre->name}}"
                                               id="fancy-checkbox-success-{{$genre->name}}" autocomplete="off"
                                               value="{{$genre->name}}"/>
                                    @endif
                                    <div class="[ btn-group ]">
                                        <label for="fancy-checkbox-success-{{$genre->name}}"
                                               class="[ btn btn-success ]">
                                            <span class="[ glyphicon glyphicon-ok ]"></span>
                                            <span> </span>
                                        </label>
                                        <label for="fancy-checkbox-success-{{$genre->name}}"
                                               class="[ btn btn-success active ]">
                                            {{$genre->name}}
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
                                @foreach($festivals as $festival)
                                    <div class="portfolio-item festival col-md-4 col-sm-6">
                                        <div class="recent-work-wrap">
                                            <a href="{{ action('FestivalController@Details', $festival->permalink) }}"
                                               rel="prettyPhoto">
                                                <img class="img-responsive imagen-festival"
                                                     src="{{ route('festival.image', ['permalink' => $festival->permalink, 'filename' => $festival->pathLogo]) }}">
                                            </a>
                                            <div class="overlay">
                                                <div class="recent-work-inner">
                                                    <div class="portfolio-caption">
                                                        <h3>
                                                            <a href="{{ action('FestivalController@Details', $festival->permalink) }}"><strong>{{$festival->name}}</strong></a>
                                                        </h3>
                                                        <p class="text-muted hidden-xs">
                                                        <div class="alert alert-success hidden-xs">
                                                            {{$festival->showDateFestival($festival->date)->format('l j \\d\\e F Y')}}
                                                        </div>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <div class="pagination pagination-lg">
                {{ $festivals->links() }}
            </div>
        </div>
    @endif
@endsection
