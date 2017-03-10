<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Awiten Fests</title>
</head>

<body>
@if(isset($festivals))
    <h1>Festivales:</h1>
    <ul>
        @forelse($festivals as $festival)
            <li><a href="festivals/{{$festival->id}}">{{$festival->name}}</a></li>
        @empty
            <h2>No hay festivales en la BD</h2>
        @endforelse
    </ul>
    <a href="/">Inicio</a>
@elseif(isset($festival))
    <h1>{{$festival->name}}</h1>
    <ul>
        <li>Localizacion: {{$festival->location}}</li>
        <li>Fecha: {{$festival->date}}</li>
        <li>Provincia: {{$festival->province}}</li>
        <li>
            Artistas:
            <ul>
                @forelse($festival->artists as $artist)
                    <li><a href="/artists/{{$artist->id}}">{{$artist->name}}</a></li>
                @empty
                    Ninguno
                @endforelse
            </ul>
        </li>
    </ul>
    <a href="/festivals">Festivales</a>
    <a href="/">Inicio</a>
@endif
</body>
</html>