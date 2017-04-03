@extends('welcome')
@section('menu')
<div class="arreglar-margen">
    <h1 style="font-family:verdana; text-align:center" >Artistas</h1>
    <ul>
        <div class="item active" style="background-image: url(images/festival-fondo2.jpg)">
        		<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
                 
   
        @forelse($artists as $artist)
            <div>
                <img class = "lista-artistas-prinicpal" src={{ asset('images/artistas/' . trim($artist->name) . '/' . trim($artist->name) . '1.jpg') }}>
                <div>
                <a href="/artist/{{$artist->permalink}}"> {{$artist->name}}</a>
                </div>
            </div>
        @empty
            <h2>No hay artistas en la BD</h2>
        @endforelse
        </div>
    </ul>
    <p>
        <input type="button" onclick="location.href='/artist/new/';" value="Nuevo artista"/>
    </p>
    <a href="/">Inicio</a>
</div>
@endsection