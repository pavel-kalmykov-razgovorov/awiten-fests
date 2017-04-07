@extends('welcome')
@section('mainContent')
<div class="arreglar-margen">
<h1 style="color: black;">Noticia</h1>

    <h2 style="color: black;">{{$post->title}}</h2>
    <h4 style="color: black;">{{$post->lead}}</h4>
    <h7 style="color: black;">{{$post->body}}</h7>
     <hr>
    
   

</div>
@endsection