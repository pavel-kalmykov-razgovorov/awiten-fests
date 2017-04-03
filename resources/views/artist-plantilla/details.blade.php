@extends('welcome')
@section('menu')
<div class="arreglar-margen">
<div>
    <div class = "fondo-artista">
        
        <div >
            <div>
                <img class = "profileHeaderBackground" src={{ asset('images/artistas/' . trim($artist->name) . '.jpg') }} style='height: 100%; width: 100%;'>
                     <h3  style="font-family:verdana; text-align:center">PRÓXIMAS ACTUACIONES </h3>
                <img class = "image-encima" src={{ asset('images/logos2/Soundcloud.png') }} alt="soundcloud" width="82" height="82" align="left">
             </div>   
        </div>
    </div>
</div>


<ul>
    
       
    
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
            @forelse($artist->festivals as $festival)
            <div class="post-container1">

                <h4><a href="/festival/{{$festival->permalink}}">{{$festival->name}}</a></h4>
                <div class="post-thumb1"> <img  class = "lista-festivales" src={{ asset('images/logos2/' . trim($festival->name) . '.png') }}></div>
             
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
</ul>
<p>
    <input type="button" onclick="location.href='/{{Request::path()}}/delete/';" value="Borrar"/>
    <input type="button" onclick="location.href='/{{Request::path()}}/edit/';" value="Editar"/>
</p>
<p>
    <a href="/artists">Artistas</a>
    <a href="/">Inicio</a>
</p>


@endsection