<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Awiten-Fests</title>
</head>
<body>
<h1>Nuevo Festival</h1>
<form action="create" method="post">
    <ul>
        <li> Nombre: <input type="text" name="name" required value="{{$festival->name}}"></li>
        <li> Logo: <input type="file" name="logo" accept="image/gif, image/jpeg, image/png"
                          value="{{$festival->pathLogo}}"></li>
        <li> Cartel: <input type="file" name="cartel" accept="image/gif, image/jpeg, image/png"
                            value="{{$festival->pathCartel}}"></li>
        <li> Localización: <input type="text" name="location" value="{{$festival->location}}"></li>
        <li> Provincia: <input type="text" name="province" value="{{$festival->province}}"></li>
        <li> Fecha: <input type="date" name="date" min="2017-01-01" max="2018-12-31" value="{{$festival->date}}"></li>
        <li>
            Artistas:
            <input type="button" onclick="addEntry()" value="Nuevo artista"/>
            <ul id="artists-list">
                {{-- Aunque tengamos el template, también generamos las opciones ya predefinidas --}}
                {{-- No sé cómo hacer que se generen las unas y las otras sólo utilizando el template --}}
                @foreach ($festival->artists as $artist_of_festival)
                    <li id="artist-entry">
                        <select name="artists[]">
                            @forelse ($artists as $artist)
                                @if($artist_of_festival->permalink == $artist->permalink)
                                    <option value="{{$artist->permalink}}" selected>{{$artist->name}}</option>
                                @else
                                    <option value="{{$artist->permalink}}">{{$artist->name}}</option>
                                @endif
                            @empty
                                <option value="">No hay festivales registrados</option>
                            @endforelse
                        </select>
                        <input type="button" onclick="removeEntry(this)" value="x">
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
    <input type="submit" value="Crear">
    <input type="button" onclick="location.href='/artists';" value="Cancelar">
    {{ csrf_field() }}
</form>

<template id="artist-entry-template">
    <li>
        <select name="artists[]">
            @forelse ($artists as $artist)
                <option value="{{$artist->permalink}}">{{$artist->name}}</option>
            @empty
                <option value="" disabled>No hay artistes registrados</option>
            @endforelse
        </select>
        <input type="button" onclick="removeEntry(this)" value="x">
    </li>
</template>

</body>
<script>
    function addEntry() {
        document.querySelector('#artists-list')
            .appendChild(document.importNode(document.querySelector('#artist-entry-template').content, true));
    }

    function removeEntry(elem) {
        elem.parentNode.parentNode.removeChild(elem.parentNode);
    }
</script>
</html>