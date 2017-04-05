@extends('welcome')
@section('mainContent')

@if(session('deleted'))
    <h3>El artista se ha borrado correctamente</h3>
@endif
 <div class="container">
        <div class="breadcrumb navbar-form">
            <form method="GET" action="{{ action('ArtistController@en6') }}">
                <button type="summit" class="btn btn-info">Mostrar de 6 en 6</button>
            </form>
            <form method="GET" action="{{ action('ArtistController@ordenar') }}">
                <button type="summit" class="btn btn-info">Ordenar por nombre</button>
            </form>
            <form method="get" action="{{ action('ArtistController@busqueda') }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="buscado">
                    <button type="summit" class="btn btn-warning">Buscar</button>
                </div>
            </form>
        </div>
    </div>
<h1 style="background-color:rgb(90,90,90);color:white; text-align: center">Artistas</h1>   
<ul>
    @forelse($artists as $artist)
        <a href="{{action('ArtistController@Details', $artist->permalink)}}">
            <img class = "lista-artistas-prinicpal" src="{{ asset('images/artistas/' . trim($artist->permalink) . '/' . 'profile.jpg') }}">
        </a>
    @empty
        <h2>No hay artistas en la BD</h2>
        
    @endforelse
    
</ul>
<ul>
    {{ $artists->links() }}
</ul style="padding-left: 62px;">
<p>
    <input type="button" onclick="location.href='{{action('ArtistController@FormNew')}}';" value="Nuevo artista"/>
    <input type="button" onclick="location.href='/';" value="Inicio"/>
</p>

@endsection