@if(isset($artist))
    <h1>Borrar artista</h1>
    <p>¿Seguro que quiere borrar al artista {{$artist->name}}?</p>
    <p>
        <input type="button" onclick="location.href='{{action('ArtistController@Details', $permalink)}}';" value="Cancelar"/>
        <input type="button" onclick="location.href='{{action('ArtistController@DeleteConfirm', $permalink)}}';"
               value="Borrar"/>
    </p>
@else
    <h3>El artista {{str_replace('-', ' ', title_case($permalink))}} no existe. Probablemente haya sido borrado de la
        base de datos</h3>
@endif