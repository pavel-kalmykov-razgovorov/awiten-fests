@extends('welcome')
@section('inner-content')
    <h1>Nuevo Festival</h1>
    <form action="create" method="post">
        <ul>
            <li> Nombre: <input type="text" name="name" required></li>
            <li> Logo: <input type="file" name="logo" accept="image/gif, image/jpeg, image/png"/>
            <li> Cartel: <input type="file" name="cartel" accept="image/gif, image/jpeg, image/png"/>
            <li> Localización: <input type="text" name="location"></li>
            <li> Provincia: <input type="text" name="province"></li>
            <li> Fecha: <input type="date" name="date" min="2017-01-01" max="2018-12-31"></li>
            <li>
                Artistas:
                <input type="button" onclick="addEntry()" value="Nuevo artista"/>
                <ul id="artists-list"></ul>
            </li>
        </ul>
        <input type="button" onclick="location.href='/artists';" value="Cancelar">
        <input type="submit" value="Crear">
        {{ csrf_field() }}
    </form>

    <template id="artist-entry">
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
@endsection
<script>
    function addEntry() {
        document.querySelector('#artists-list')
            .appendChild(document.importNode(document.querySelector('#artist-entry').content, true));
    }

    function removeEntry(elem) {
        elem.parentNode.parentNode.removeChild(elem.parentNode);
    }
</script>