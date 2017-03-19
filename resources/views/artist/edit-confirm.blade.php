<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Awiten Fests</title>
</head>
<body>
<h1>Editar Artista</h1>
El artista <a href="/artist/{{$artist->permalink}}">{{$artist->name}}</a> se ha modificado correctamente
<p>
    <a href="/artists/">Artistas</a>
    <a href="/">Inicio</a>
</p>
</body>
</html>