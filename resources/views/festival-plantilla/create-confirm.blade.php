@extends('welcome)
@section('inner-content')
    <h1>Nuevo Festival</h1>
    El nuevo festival <a href="/festival/{{$festival->permalink}}">{{$festival->name}}</a> se ha creado correctamente
@endsection