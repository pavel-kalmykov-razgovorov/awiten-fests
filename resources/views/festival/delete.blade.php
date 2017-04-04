<h1>Borrar Festival</h1>
<p>¿Seguro que quiere borrar al festival {{$festival->name}}?</p>
<p>
    <input type="button" onclick="window.location ='{{action('FestivalController@Details', $permalink)}}';"
           value="Cancelar"/>
    <input type="button" onclick="window.location ='{{action('FestivalController@DeleteConfirm', $permalink)}}';"
           value="Borrar"/>
</p>