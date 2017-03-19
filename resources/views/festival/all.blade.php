<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Awiten Fests</title>
</head>

<body>
<h1>Festivales:</h1>
<ul>
    @forelse($festivals as $festival)
        <li><a href="/festival/{{$festival->permalink}}">{{$festival->name}}</a></li>
    @empty
        <h2>No hay festivales en la BD</h2>
    @endforelse
</ul>
<a href="/">Inicio</a>
</body>
</html>