@extends('welcome')
@section('mainContent')
<div class="arreglar-margen">
@if(session('deleted'))
    <h3>El artista se ha borrado correctamente</h3>
@endif
<div>
<h1 style="background-color:rgb(0,0,0);color:white; font-weight:bold; text-align:center">Artistas</h1>
</div>
<ul>
    @forelse($artists as $artist)
        <a href="{{action('ArtistController@Details', $artist->permalink)}}">
            <img class = "lista-artistas-prinicpal" src="{{ asset('images/artistas/' . trim($artist->permalink) . '/' . 'profile.jpg') }}">
        </a>
        
    @empty
        <h2>No hay artistas en la BD</h2>
        
    @endforelse
    
</ul>
<ul>
    {{ $artists->links() }}
</ul style="padding-left: 62px;">
<p>
    <div class="navbar-form">
        <form method="get" action="{{ action('ArtistController@busqueda') }}">
        <input type="button" class="boton" onclick="location.href='{{ action('ArtistController@ordenar') }}';" value="Ordenar por nombre"/>
        <input type="button" class="boton" onclick="location.href='{{ action('ArtistController@en6') }}';" value="Mostrar de 6 en 6"/>
                    <input type="text" class="form-control" name="buscado" >
                    <button type="summit" class="btn btn-warning">Buscar</button>


     </form>
           
    </div>
    <br>
    <div class="navbar-form">
        <input type="button" class="boton2" onclick="location.href='{{action('ArtistController@FormNew')}}';" value="Nuevo artista"/>
        <input type="button" class="boton3" onclick="location.href='/';" value="Inicio"/>
        <br><br><br>
    </div>
</p>

</div>
@endsection