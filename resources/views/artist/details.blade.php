@extends('welcome')
@section('menu')
<div class="arreglar-margen">
<h1>Detalles Artista</h1>
<ul>
    <div class="item active" style="background-image: url(images/festival-fondo2.jpg)">
        <!--<img class="img-responsive" src="{!! HTML::style('css/diablo.jpg') !!}" alt="Chania" width="460" height="345"> -->
    <li>Nombre: {{$artist->name}}</li>
    <li>SoundCloud: <a href="{{$artist->soundcloud}}">{{$artist->soundcloud}}</a></li>
    <li>Sitio Web: <a href="{{$artist->website}}">{{$artist->website}}</a></li>
    <li>País: {{$artist->country}}</li>
    </div>
    <li>
        Festivales:
        <ul>
            @forelse($artist->festivals as $festival)
                <li><a href="/festival/{{$festival->permalink}}">{{$festival->name}}</a></li>
            @empty
                Ninguno
            @endforelse
        </ul>
    </li>
</ul>
<p>
    <input type="button" onclick="location.href='/{{Request::path()}}/delete/';" value="Borrar"/>
    <input type="button" onclick="location.href='/{{Request::path()}}/edit/';" value="Editar"/>
</p>
<p>
    <a href="/artists">Artistas</a>
    <a href="/">Inicio</a>
</p>
</div>

@endsection