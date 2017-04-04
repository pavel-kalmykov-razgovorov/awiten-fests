@extends('welcome')


@section('mainContent')
<h1>{{$festival->name}}</h1>cxcc
<ul>
    <li>Localizacion: {{$festival->location}}</li>
    <li>Fecha: {{$festival->date}}</li>
    <li>Provincia: {{$festival->province}}</li>
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
<a href="/festivals">Festivales</a>
<a href="/">Inicio</a>
@endsection