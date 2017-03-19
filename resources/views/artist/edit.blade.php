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
<form action="update" method="post">
    <ul>
        <li> Nombre: <input type="text" name="name" required value="{{$artist->name}}"> </li>
        <li> Soundcloud: <input type="text" name="soundcloud" value="{{$artist->soundcloud}}"> </li>
        <li> Sitio Web: <input type="text" name="website" value="{{$artist->website}}"> </li>
        <li> País: <input type="text" name="country" value="{{$artist->country}}"> </li>
        <li>
            Festivales:
            <input type="button" onclick="addFestivalEntry()" value="Nuevo festival"/>
            <ul>
                @foreach ($artist->festivals as $artist_festival)
                    <li id="festival-entry">
                        <select name="festivals[]">
                            @forelse ($festivals as $festival)
                                @if($artist_festival->permalink == $festival->permalink)
                                    <option value="{{$festival->permalink}}" selected>{{$festival->name}}</option>
                                @else
                                    <option value="{{$festival->permalink}}">{{$festival->name}}</option>
                                @endif
                            @empty
                                <option value="">No hay festivales registrados</option>
                            @endforelse
                        </select>
                        <input type="button" onclick="removeFestivalEntry(this)" value="x">
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
    <input type="submit" value="Actualizar">
    <input type="button" onclick="location.href='/artists';" value="Cancelar">
    {{ csrf_field() }}
</form>
</body>
<script>
function addFestivalEntry() {
    document.getElementById('festival-entry').parentNode
        .appendChild(document.getElementById('festival-entry').cloneNode(true));
}

function removeFestivalEntry(elem) {
    elem.parentNode.parentNode.removeChild(elem.parentNode);
}
</script>
</html>