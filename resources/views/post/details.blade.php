@extends('welcome')
@section('mainContent')
    <h1>Noticia de {{$festival}}</h1>
    <h2>{{$post->title}}</h2>
    <p>{{$post->lead}}</p>
    <p>{{$post->body}}</p>
@endsection