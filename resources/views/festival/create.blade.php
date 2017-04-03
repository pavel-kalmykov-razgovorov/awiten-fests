<h1>Nuevo Festival</h1>
@if(count($errors) > 0)
    <h3>Hay errores:</h3>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{action('FestivalController@Create')}}" method="post">
    {{method_field('post')}}
    {{csrf_field()}}
    <ul>
        <li> Nombre: <input type="text" name="name" required title="Nombre"></li>
        <li> Logo: <input type="file" name="logo" accept="image/gif, image/jpeg, image/png"/>
        <li> Cartel: <input type="file" name="cartel" accept="image/gif, image/jpeg, image/png"/>
        <li> Localización: <input type="text" name="location" title="Localización"></li>
        <li> Provincia: <input type="text" name="province" title="Provincia"></li>
        <li> Fecha: <input type="date" name="date" min="2017-01-01" max="2018-12-31" title="Fecha"></li>
        <li>
            Artistas:
            <input type="button" onclick="addArtistEntry()" value="Nuevo artista"/>
            <ul id="artists-list"></ul>
        </li>
    </ul>
    <input type="button" onclick="location.href='{{action('ArtistController@All')}}';" value="Cancelar">
    <input type="submit" value="Crear">
</form>
<template id="artist-entry">
    <li>
        <select name="artists-select[]" title="Lista de Artistas">
            @forelse ($artists as $artist)
                <option value="{{$artist->id}}">{{$artist->name}}</option>
            @empty
                <option disabled>No hay artistas registrados</option>
            @endforelse
        </select>
        <input type="button" onclick="removeArtistEntry(this)" value="x">
    </li>
</template>
<script>
    function addArtistEntry() {
        document.querySelector('#artists-list').appendChild(
            document.importNode(document.querySelector('#artist-entry').content, true)
        );
    }

    function removeArtistEntry(elem) {
        elem.parentNode.parentNode.removeChild(elem.parentNode);
    }
</script>