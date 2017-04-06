@extends('welcome')
@section('mainContent')
<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">	
                <div class="row">
                    <div class="col-md-12">
                        <form method="get" action="{{ action('ArtistController@busquedaConCambios') }}">
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
                                    <option value="asc" selected>Nombre Asc</option>
                                    <option value="desc">Nombre Desc</option>
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

@if(session('deleted'))
    <h3>El artista se ha borrado correctamente</h3>
@endif

    @if(count($artists) != 0)
        <div>
            <h1 style="background-color:rgb(0,0,0);color:white; font-weight:bold; text-align:center">Artistas</h1>
        </div>
    @else
        <div class="alert alert-danger">
            <h1>   No se han encontrado artistas.</h1>
        </div>
    @endif

<ul>
@if(count($artists) != 0)
    <div class="center col-md-2">
        <ul class="portfolio-filter text-center">
            <form class="text-left" method="get" action="{{ action('ArtistController@busquedaPorGenero') }}">
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
            </form>
        </ul>
    </div>
    <div class="col-md-10">
        <div class="row">
            <div class="center col-md-12">
                <div class="portfolio-items">
                    @foreach($artists as $artist)
                        <div class="portfolio-item col-md-4 col-sm-6">
                            <a href="{{action('ArtistController@Details', $artist->permalink)}}">
                                <img class = "imagen-artista" src="{{ asset('images/artistas/' . trim($artist->permalink) . '/' . 'profile.jpg') }}">
                            </a>
                            <div class="text-center">
                                <h3><a href="/artist/{{$artist->permalink}}">{{$artist->name}}</a></h3>
                            </div>
                        </div>
                    @endforeach    
                </div>
            </div>
        </div>
    </div>
</ul>
<div class="text-center">
        <div class="pagination pagination-lg">
                {{ $artists->links() }}
        </div>
    </div>
<p>
    <br>
    <div class="navbar-form">
        <input type="button" class="boton2" onclick="location.href='{{action('ArtistController@FormNew')}}';" value="Nuevo artista"/>
        <input type="button" class="boton3" onclick="location.href='/';" value="Inicio"/>
        <br><br><br>
    </div>
</p>
@endif
@endsection