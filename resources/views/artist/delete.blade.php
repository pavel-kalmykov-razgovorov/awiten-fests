<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Awiten Fests</title>
</head>

<body>
<h1>Borrar artista</h1>
<p>¿Seguro que quiere borrar al artista {{$artist->name}}?</p>
<p>
    <input type="button" onclick="location.href='confirm/';" value="Borrar"/>
    <input type="button" onclick="location.href='..';" value="Cancelar"/>
</p>
<p>
    <a href="/artists/">Artistas</a>
    <a href="/">Inicio</a>
</p>
</body>
</html>