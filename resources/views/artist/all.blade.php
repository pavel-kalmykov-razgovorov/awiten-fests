@extends('welcome')
@section('menu')
<div class="arreglar-margen">

@if(session('deleted'))
    <h3>El artista se ha borrado correctamente</h3>
@endif

<h1 style="background-color:rgb(90,90,90);color:white; text-align: center">Artistas</h1>   
<ul>
    @forelse($artists as $artist)
        <a href="{{action('FestivalController@Details', $artist->permalink)}}">
            <img class = "lista-artistas-prinicpal" src="{{ asset('images/artistas/' . trim($artist->permalink) . '/' . 'profile.jpg') }}">
        </a>
    @empty
        <h2>No hay artistas en la BD</h2>
        
    @endforelse
    {{ $artists->links() }}
</ul>

<p>
    <input type="button" onclick="location.href='{{action('ArtistController@FormNew')}}';" value="Nuevo artista"/>
    <input type="button" onclick="location.href='/';" value="Inicio"/>
</p>
</div>
@endsection