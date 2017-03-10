<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Awiten Fests</title>
</head>

<body>
@if(isset($artists))
    <h1>Artistas:</h1>
    <ul>
        @forelse($artists as $artist)
            <li>
                <a href="artists/{{$artist->id}}"> {{$artist->name}}</a>
            </li>
        @empty
            <h2>No hay artistas en la BD</h2>
        @endforelse
    </ul>
    <a href="/">Inicio</a>
@elseif(isset($artist))
    <h1>{{$artist->name}}</h1>
    <ul>
        <li>SoundCloud: <a href="{{$artist->soundcloud}}">{{$artist->soundcloud}}</a></li>
        <li>WebSite: <a href="{{$artist->website}}">{{$artist->website}}</a></li>
        <li>Country: {{$artist->country}}</li>
        <li>
            Festivales:
            <ul>
                @forelse($artist->festivals as $festival)
                    <li><a href="/festivals/{{$festival->id}}">{{$festival->name}}</a></li>
                @empty
                    Ninguno
                @endforelse
            </ul>
        </li>
    </ul>
    <a href="/artists">Artistas</a>
    <a href="/">Inicio</a>
@endif
</body>
</html>