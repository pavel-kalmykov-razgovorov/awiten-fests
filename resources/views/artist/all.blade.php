@extends('welcome')
@section('menu')
<h1>Artistas</h1>
<ul>
    <div class="item active" style="background-image: url(images/festival-fondo2.jpg)">
    @forelse($artists as $artist)
        <li>
            <a href="/artist/{{$artist->permalink}}"> {{$artist->name}}</a>
        </li>
    @empty
        <h2>No hay artistas en la BD</h2>
    @endforelse
    </div>
</ul>
<p>
    <input type="button" onclick="location.href='/artist/new/';" value="Nuevo artista"/>
</p>
<a href="/">Inicio</a>
@endsection