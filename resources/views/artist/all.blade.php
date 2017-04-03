<h1>Artistas</h1>
@if(session('deleted'))
    <h3>El artista se ha borrado correctamente</h3>
@endif
<ul>
    @forelse($artists as $artist)
        <li>
            <a href="{{action('ArtistController@Details', $artist->permalink)}}"> {{$artist->name}}</a>
        </li>
    @empty
        <h2>No hay artistas en la BD</h2>
    @endforelse
</ul>
<p>
    <input type="button" onclick="location.href='{{action('ArtistController@FormNew')}}';" value="Nuevo artista"/>
    <input type="button" onclick="location.href='/';" value="Inicio"/>
</p>