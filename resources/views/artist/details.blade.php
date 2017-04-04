@extends('welcome')
@section('mainContent')
<div class="arreglar-margen">


@if(session('created'))
    <h3>El artista se ha creado correctamente</h3>
@endif
@if(session('updated'))
    <h3>El artista se ha modificado correctamente</h3>
@endif
@if(isset($artist))
<div>
    <div class = "fondo-artista">   
        <div >
            <div>
                <img style='height: 100%; width: 100%;' class = "profileHeaderBackground" src="{{ asset('images/artistas/' . trim($artist->permalink) . '/' . 'fondo.jpg') }}">
                     <h3  style="font-family:verdana; text-align:center">PRÓXIMAS ACTUACIONES </h3>
                <img class = "image-encima" src={{ asset('images/logos2/Soundcloud.png') }} alt="soundcloud" width="82" height="82" align="left">
             </div>   
        </div>
    </div>
</div>

</br>
    <a href="{{$artist->soundcloud}}">
        <img src={{ asset('images/logos2/Soundcloud.png') }} alt="soundcloud" width="82" height="82" align="left">
    </a>
    <a href="{{$artist->website}}">
        <img src={{ asset('images/logos2/Pagina.png') }} alt="web" width="82" height="82" align="right">
    </a>
    </div>
    </br>
    <h3  style="font-family:verdana; text-align:center">PRÓXIMAS ACTUACIONES </h3>
    <li>   
        <ul> 
            @forelse($artist->festivals()->get(['permalink', 'name', 'location', 'date']) as $festival)
                <div class="post-container1">

                    <h4><a href="/festival/{{$festival->permalink}}">{{$festival->name}}</a></h4>
                    <div class="post-thumb1"> <img  class = "lista-festivales" src="{{ asset('images/festivales/' . trim($festival->permalink) . '/' . 'logo.png') }}"></div>
             
                    <div class="post-content1">
                      <h4 class="post-title1"><a href="/festival/{{$festival->permalink}}">{{$festival->date}}</a></h4>
                      <h4 class="post-title1"><a href="/festival/{{$festival->permalink}}">{{$festival->location}}</a></h4>
                    </div>
                </div>
                
            @empty
                Ninguno
            @endforelse
            </ul>
        </li>
    
    <p>
        <input type="button" onclick="location.href='{{action('ArtistController@Delete', $permalink)}}';"
               value="Borrar"/>
        <input type="button" onclick="location.href='{{action('ArtistController@Edit', $permalink)}}';" value="Editar"/>
    </p>
@else
    <h3>El artista {{str_replace('-', ' ', title_case($permalink))}} no existe. Probablemente haya sido borrado de la
        base de datos</h3>
@endif

</div>
@endsection