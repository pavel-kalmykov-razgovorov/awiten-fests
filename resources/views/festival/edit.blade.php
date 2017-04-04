<h1>Editar Festival</h1>
@if(count($errors) > 0)
    <h3>Hay errores:</h3>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{action('FestivalController@Update', $permalink)}}" method="post">
    {{method_field('put')}}
    {{csrf_field()}}
    <ul>
        <li>Nombre: <input type="text" name="name" required value="{{$festival->name}}" title="Nombre"></li>
        <li>Logo: <input type="file" name="logo" accept="image/gif, image/jpeg, image/png"
                         value="{{$festival->pathLogo}}"></li>
        <li>Cartel: <input type="file" name="cartel" accept="image/gif, image/jpeg, image/png"
                           value="{{$festival->pathCartel}}"></li>
        <li>Localización: <input type="text" name="location" value="{{$festival->location}}" title="Localización">
        </li>
        <li>Provincia: <input type="text" name="province" value="{{$festival->province}}" title="Provincia"></li>
        <li>Fecha: <input type="text" name="date" value="{{\Carbon\Carbon::parse($festival->date)->format('d/m/Y')}}"
                          title="Fecha">
        </li>
        <li>
            Artistas:
            <input type="button" onclick="addEntry()" value="Nuevo artista"/>
            <ul id="artists-list">
                @foreach ($festival->artists()->get(['id']) as $artist_of_festival)
                    <li>
                        <select name="artists-select[]" title="Lista de Artistas">
                            @foreach ($artists as $artist)
                                @if($artist_of_festival->id == $artist->id)
                                    <option value="{{$artist->id}}" selected>{{$artist->name}}</option>
                                @else
                                    <option value="{{$artist->id}}">{{$artist->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="button" onclick="removeEntry(this)" value="x">
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
    <input type="button" onclick="window.location = '{{action('FestivalController@Details', $permalink)}}'"
           value="Cancelar">
    <input type="submit" value="Editar">
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
        <input type="button" onclick="removeEntry(this)" value="x">
    </li>
</template>
<script>
    function addEntry() {
        document.querySelector('#artists-list').appendChild(
            document.importNode(document.querySelector('#artist-entry').content, true)
        );
    }

    function removeEntry(elem) {
        elem.parentNode.parentNode.removeChild(elem.parentNode);
    }
</script>