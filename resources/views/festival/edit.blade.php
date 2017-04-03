<h1>Editar Festival</h1>
@if(count($errors) > 0)
    <h3>Hay errores:</h3>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@if(isset($festival))
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
            <li>Fecha: <input type="date" name="date" min="2017-01-01" max="2018-12-31" value="{{$festival->date}}"
                              title="Fecha">
            </li>
            <li>
                Artistas:
                <input type="button" onclick="addArtistEntry()" value="Nuevo artista"/>
                <ul id="artists-list">
                    @foreach ($festival->artists as $artist_of_festival)
                        <li id="artist-entry">
                            <select name="artists[]" title="Lista de artistas">
                                @foreach ($artists as $artist)
                                    @if($artist_of_festival->permalink == $artist->permalink)
                                        <option value="{{$artist->permalink}}" selected>{{$artist->name}}</option>
                                    @else
                                        <option value="{{$artist->permalink}}">{{$artist->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="button" onclick="removeArtistEntry(this)" value="x">
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <input type="button" onclick="location.href='{{action('FestivalController@Details', $permalink)}}';"
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
            <input type="button" onclick="removeArtistEntry(this)" value="x">
        </li>
    </template>
@else
    <h3>El festival {{str_replace('-', ' ', title_case($permalink))}} no existe. Probablemente haya sido borrado de la
        base de datos</h3>
@endif
<script>
    function addArtistEntry() {
        document.querySelector('#festivals-list').appendChild(
            document.importNode(document.querySelector('#festival-entry').content, true)
        );
    }

    function removeArtistEntry(elem) {
        elem.parentNode.parentNode.removeChild(elem.parentNode);
    }
</script>