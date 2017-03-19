<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Awiten Fests</title>
</head>

<body>
<h1>Detalles Artista</h1>
<ul>
    <li>Nombre: {{$artist->name}}</li>
    <li>SoundCloud: <a href="{{$artist->soundcloud}}">{{$artist->soundcloud}}</a></li>
    <li>Sitio Web: <a href="{{$artist->website}}">{{$artist->website}}</a></li>
    <li>País: {{$artist->country}}</li>
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
</body>
</html>