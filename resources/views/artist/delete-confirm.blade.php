<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Awiten Fests</title>
</head>
<body>
<h1>Borrar artista</h1>
@if($deleted)
    <p>El artista <strong>{{$name}}</strong> ha sido borrado correctamente</p>
@else
    <p>El artista no se ha podido borrar correctamente. Es posible que ya esté eliminado.</p>
@endif
<p>
    <a href="/artists/">Artistas</a>
    <a href="/">Inicio</a>
</p>
</body>
</html>