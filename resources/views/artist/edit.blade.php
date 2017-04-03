<h1>Editar Artista</h1>
@if(count($errors) > 0)
    <h3>Hay errores:</h3>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@if(isset($artist))
    <form action="{{action('ArtistController@Update', $permalink)}}" method="post">
        {{method_field('put')}}
        {{csrf_field()}}
        <ul>
            <li> Nombre: <input type="text" name="name" title="Nombre" value="{{$artist->name}}"></li>
            <li> Soundcloud: <input type="text" name="soundcloud" title="SoundCloud" value="{{$artist->soundcloud}}">
            </li>
            <li> Sitio Web: <input type="text" name="website" title="Sitio Web" value="{{$artist->website}}"></li>
            <li> País: <input type="text" name="country" title="País" value="{{$artist->country}}"></li>
            <li>
                Festivales:
                <input type="button" onclick="addFestivalEntry()" value="Nuevo festival"/>
                <ul id="festivals-list">
                    @foreach ($artist->festivals()->get(['id']) as $artist_festival)
                        <li>
                            <select name="festivals-select[]" title="festival-options">
                                @foreach ($festivals as $festival)
                                    @if($artist_festival->id == $festival->id)
                                        <option value="{{$festival->id}}" selected>{{$festival->name}}</option>
                                    @else
                                        <option value="{{$festival->id}}">{{$festival->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <input type="button" onclick="removeArtistEntry(this)" value="x">
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <input type="button" onclick="location.href='{{action('ArtistController@Details', $permalink)}}';"
               value="Cancelar">
        <input type="submit" value="Editar">
    </form>
    <template id="festival-entry">
        <li>
            <select name="festivals-select[]" title="festivals-options">
                @forelse ($festivals as $festival)
                    <option value="{{$festival->id}}">{{$festival->name}}</option>
                @empty
                    <option disabled>No hay festivales registrados</option>
                @endforelse
            </select>
            <input type="button" onclick="removeArtistEntry(this)" value="x">
        </li>
    </template>
@else
    <h3>El artista {{str_replace('-', ' ', title_case($permalink))}} no existe. Probablemente haya sido borrado de la
        base de datos</h3>
@endif
<script>
    function addFestivalEntry() {
        document.querySelector('#festivals-list').appendChild(
            document.importNode(document.querySelector('#festival-entry').content, true)
        );
    }

    function removeArtistEntry(elem) {
        elem.parentNode.parentNode.removeChild(elem.parentNode);
    }
</script>