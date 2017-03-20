<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Awiten Fests</title>
</head>
<body>
<h1>Nuevo Artista</h1>
<form action="create" method="post">
    <ul>
        <li> Nombre: <input type="text" name="name" required> </li>
        <li> Soundcloud: <input type="text" name="soundcloud"> </li>
        <li> Sitio Web: <input type="text" name="website"> </li>
        <li> País: <input type="text" name="country"> </li>
        <li>
            Festivales:
            <input type="button" onclick="addFestivalEntry()" value="Nuevo festival"/>
            <ul>
                <li id="festival-entry">
                    <select name="festivals[]">
                        @forelse ($festivals as $festival)
                            <option value="{{$festival->permalink}}">{{$festival->name}}</option>
                        @empty
                            <option value="" disabled>No hay festivales registrados</option>
                        @endforelse
                    </select>
                    <input type="button" onclick="removeFestivalEntry(this)" value="x">
                </li>
            </ul>
        </li>
    </ul>
    <input type="submit" value="Crear">
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