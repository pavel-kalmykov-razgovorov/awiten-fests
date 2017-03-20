<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Awiten Fests</title>
</head>

<body>
<h1>Artistas</h1>
<ul>
    @forelse($artists as $artist)
        <li>
            <a href="/artist/{{$artist->permalink}}"> {{$artist->name}}</a>
        </li>
    @empty
        <h2>No hay artistas en la BD</h2>
    @endforelse
</ul>
<p>
    <input type="button" onclick="location.href='/artist/new/';" value="Nuevo artista"/>
</p>
<a href="/">Inicio</a>
</body>
</html>