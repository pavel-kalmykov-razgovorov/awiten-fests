<h1>Festivales</h1>
@if(session('deleted'))
    <h3>El festival se ha borrado correctamente</h3>
@endif
<ul>
    @forelse($festivals as $festival)
        <li>
            <a href="{{action('FestivalController@Details', $festival->permalink)}}"> {{$festival->name}}</a>
        </li>
    @empty
        <h2>No hay festivales en la BD</h2>
    @endforelse
</ul>
<p>
    <input type="button" onclick="location.href='{{action('FestivalController@FormNew')}}';" value="Nuevo festival"/>
    <input type="button" onclick="location.href='/';" value="Inicio"/>
</p>