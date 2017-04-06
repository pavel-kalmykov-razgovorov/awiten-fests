@extends('welcome')

@section('mainContent')
  <div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">	
                <div class="row">
                    <div class="col-md-12">
                        <form method="get" action="{{ action('FestivalController@busquedaConCambios') }}">
                            <div class="input-group add-on btn-group">
                                <div class="col col-md-3">
                                    <input type="text" class="form-control" name="buscado" placeholder="Introduce el festival">
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
                                    <option value="asc" selected>Asc</option>
                                    <option value="desc">Desc</option>
                                    </select>
                                 </div>
                                <button type="summit" class="btn btn-warning"><i class="glyphicon glyphicon-search"></i></button>
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
                    <h1 class="text-center" style="color: Black">Festivales:</h1>
                @else
                    <div class="alert alert-danger">
                     <h1>   No se han encontrado festivales.</h1>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if(count($festivals) != 0)
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
                                    <p><h2>No hay festivales en la BD</h2></p>
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
    @endif
@endsection

