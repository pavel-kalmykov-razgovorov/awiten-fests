<h1>Detalles Artista</h1>
@if(session('created'))
    <h3>El artista se ha creado correctamente</h3>
@endif
@if(session('updated'))
    <h3>El artista se ha modificado correctamente</h3>
@endif
@if(isset($artist))
    <ul>
        <li>Nombre: {{$artist->name}}</li>
        <li>SoundCloud: <a href="{{$artist->soundcloud}}">{{$artist->soundcloud}}</a></li>
        <li>Sitio Web: <a href="{{$artist->website}}">{{$artist->website}}</a></li>
        <li>País: {{$artist->country}}</li>
        <li>
            Festivales:
            <ul>
                @forelse($artist->festivals()->get(['permalink', 'name']) as $festival)
                    <li><a href="/festival/{{$festival->permalink}}">{{$festival->name}}</a></li>
                @empty
                    Ninguno
                @endforelse
            </ul>
        </li>
    </ul>
    <p>
        <input type="button" onclick="location.href='{{action('ArtistController@Delete', $permalink)}}';"
               value="Borrar"/>
        <input type="button" onclick="location.href='{{action('ArtistController@Edit', $permalink)}}';" value="Editar"/>
    </p>
@else
    <h3>El artista {{str_replace('-', ' ', title_case($permalink))}} no existe. Probablemente haya sido borrado de la
        base de datos</h3>
@endif