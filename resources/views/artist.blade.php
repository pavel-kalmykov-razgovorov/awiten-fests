<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! HTML::style('css/style.css') !!}
    <title>Awiten Fests</title>
</head>

<body>
<h1>{{$artist->name}}</h1>
<ul>
    <li>SoundCloud: <a href="{{$artist->soundcloud}}">{{$artist->soundcloud}}</a></li>
    <li>WebSite: <a href="{{$artist->website}}">{{$artist->website}}</a></li>
    <li>Country: {{$artist->country}}</li>
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
<a href="/artists">Artistas</a>
<a href="/">Inicio</a>
</body>
</html>