@extends('welcome')
@section('menu')
<div class="arreglar-margen">
<h1>Artistas</h1>
@if(session('deleted'))
    <h3>El artista se ha borrado correctamente</h3>
@endif
<ul>
    @forelse($artists as $artist)
         <div>
                <img class = "lista-artistas-prinicpal" src="{{ asset('images/artistas/' . trim($artist->permalink) . '/' . 'profile.jpg') }}">
                <div>
                <a href="/artist/{{$artist->permalink}}"> {{$artist->name}}</a>
                </div>
            </div>
    @empty
        <h2>No hay artistas en la BD</h2>
    @endforelse
</ul>
<p>
    <input type="button" onclick="location.href='{{action('ArtistController@New')}}';" value="Nuevo artista"/>
    <input type="button" onclick="location.href='/';" value="Inicio"/>
</p>
</div>
@endsection