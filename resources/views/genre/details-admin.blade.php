@extends('admin.master')
@section('title', $genre->name)
@section('content')
    <h1 class="page-header">{{$genre->name}}</h1>
    @if(session('created') != null)
        <div class="alert {{session('created') ? 'alert-success' : 'alert-warning'}}">
            @if(session('created')) {{$genre->name}} se ha creado correctamente.
            @else {{$genre->name}} no se ha podido crear. Probablemente ya exista en la base de datos.
            @endif
        </div>
    @endif
    @if(session('updated') != null)
        <div class="alert {{session('updated') ? 'alert-success' : 'alert-warning'}}">
            @if(session('updated')) {{$genre->name}} se ha modificado correctamente.
            @else {{$genre->name}} no se ha podido modificar. Probablemente ya exista en la base de datos.
            @endif
        </div>
    @endif
    <ul class="list-group">
        @foreach($column_names as $column_name)
            <li class="list-group-item">
                <strong>{{$column_name}}:</strong> {{$genre->$column_name ?? "[null]"}}
            </li>
        @endforeach
        <li class="list-group-item">
            <strong>Festivales:</strong>
            <ul>
                @foreach($genre->festivals as $genre_festival)
                    <li class="arrow-list-glyph">
                        <a href="{{action('FestivalController@DetailsAdmin', $genre_festival->permalink)}}">{{$genre_festival->name}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="list-group-item">
            <strong>Artistas:</strong>
            <ul>
                @foreach($genre->artists as $genre_artist)
                    <li class="arrow-list-glyph">
                        <a href="#">{{$genre_artist->name}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
    <a href="{{action('AdminController@GenresList')}}" class="btn btn-default">Géneros</a>
    <a href="{{action('GenreController@Edit', $permalink)}}" class="btn btn-default">Editar</a>
    <a href="{{action('GenreController@Delete', $permalink)}}" class="btn btn-default"
       data-toggle="confirmation" data-placement="top" data-singleton="true" data-popout="true"
       data-btn-cancel-label="Cancelar" data-btn-cancel-icon="glyphicon glyphicon-remove"
       data-btn-cancel-class="btn-danger"
       data-btn-ok-label="Eliminar" data-btn-ok-icon="glyphicon glyphicon-ok"
       data-btn-ok-class="btn-success"
       data-title="Estás seguro?" data-content="No podrás recuperarlo">Borrar</a>
    <script>
        $(function () {
            $('#home').removeClass('active');
            $('#genres').addClass('active');
        });
    </script>
@endsection