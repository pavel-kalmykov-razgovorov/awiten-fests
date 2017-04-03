<h1>Borrar Artista</h1>
<p>¿Seguro que quiere borrar al artista {{$artist->name}}?</p>
<p>
    <input type="button" onclick="location.href='{{action('ArtistController@Details', $permalink)}}';"
           value="Cancelar"/>
    <input type="button" onclick="location.href='{{action('ArtistController@DeleteConfirm', $permalink)}}';"
           value="Borrar"/>
</p>
