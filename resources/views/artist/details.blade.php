<h1>Detalles Artista</h1>
@if(session('created'))
    <h3>El artista se ha creado correctamente</h3>
@endif
@if(session('updated'))
    <h3>El artista se ha modificado correctamente</h3>
@endif
<ul>
    <li>Nombre: {{$artist->name}}</li>
    <li>SoundCloud: <a href="{{$artist->soundcloud}}">{{$artist->soundcloud}}</a></li>
    <li>Sitio Web: <a href="{{$artist->website}}">{{$artist->website}}</a></li>
    <li>País: {{$artist->country}}</li>
    <li>
        Festivales:
        <ul>
            @forelse($artist->festivals()->get(['permalink', 'name']) as $festival)
                <li><a href="{{action('FestivalController@Details', $festival->permalink)}}">{{$festival->name}}</a>
                </li>
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
<p>
    <input type="button" onclick="location.href='{{action('ArtistController@All')}}';" value="Artistas"/>
    <input type="button" onclick="location.href='/';" value="Inicio"/>
</p>