<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Awiten Fests</title>
</head>

<body>
<h1>{{$festival->name}}</h1>
<ul>
    <li>Localizacion: {{$festival->location}}</li>
    <li>Fecha: {{$festival->date}}</li>
    <li>Provincia: {{$festival->province}}</li>
    <li>
        Artistas:
        <ul>
            @forelse($festival->artists as $artist)
                <li><a href="/artist/{{$artist->id}}">{{$artist->name}}</a></li>
            @empty
                Ninguno
            @endforelse
        </ul>
    </li>
</ul>
<a href="/festivals">Festivales</a>
<a href="/">Inicio</a>
</body>
</html>