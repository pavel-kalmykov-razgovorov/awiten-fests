<h1>Detalles Festival</h1>
@if(session('created'))
    <h3>El festival se ha creado correctamente</h3>
@endif
@if(session('updated'))
    <h3>El festival se ha modificado correctamente</h3>
@endif
@if(isset($festival))
    <ul>
        <li>Nombre: {{$festival->name}}</li>
        <li>Ruta logo: {{$festival->pathLogo}}</li>
        <li>Ruta cartel: {{$festival->pathCartel}}</li>
        <li>Localizacion: {{$festival->location}}</li>
        <li>Provincia: {{$festival->province}}</li>
        <li>Fecha: {{$festival->date}}</li>
        <li>
            Artistas:
            <ul>
                @forelse($festival->artists as $artist)
                    <li><a href="/artist/{{$artist->permalink}}">{{$artist->name}}</a></li>
                @empty
                    Ninguno
                @endforelse
            </ul>
        </li>
    </ul>
    <p>
        <input type="button" onclick="location.href='{{action('FestivalController@Delete', $permalink)}}';"
               value="Borrar"/>
        <input type="button" onclick="location.href='{{action('FestivalController@Edit', $permalink)}}';"
               value="Editar"/>
    </p>
@else
    <h3>El festival {{str_replace('-', ' ', title_case($permalink))}} no existe. Probablemente haya sido borrado de la
        base de datos</h3>
@endif