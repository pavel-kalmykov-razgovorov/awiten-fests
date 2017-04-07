@extends('admin.master')
@section('title', $artist->name)
@section('content')
    <h1 class="page-header">{{$artist->name}}</h1>
    @if(session('created') != null)
        <div class="alert {{session('created') ? 'alert-success' : 'alert-warning'}}">
            @if(session('created')) {{$artist->name}} se ha creado correctamente.
            @else {{$artist->name}} no se ha podido crear. Probablemente ya exista en la base de datos.
            @endif
        </div>
    @endif
    @if(session('updated') != null)
        <div class="alert {{session('updated') ? 'alert-success' : 'alert-warning'}}">
            @if(session('updated')) {{$artist->name}} se ha modificado correctamente.
            @else {{$artist->name}} no se ha podido modificar. Probablemente ya exista en la base de datos.
            @endif
        </div>
    @endif
    <ul class="list-group">
        @foreach($column_names as $column_name)
            <li class="list-group-item">
                <strong>{{$column_name}}:</strong>
                @if(filter_var($artist->$column_name, FILTER_VALIDATE_URL))
                    <a href="{{$artist->$column_name}}">
                        {{$artist->$column_name ?? "[null]"}}
                    </a>
                @else
                    {{$artist->$column_name ?? "[null]"}}
                @endif
            </li>
        @endforeach
        <li class="list-group-item">
            <strong>Festivales:</strong>
            <ul>
                @foreach($artist->festivals as $artist_festival)
                    <li class="arrow-list-glyph">
                        <a href="{{action('FestivalController@Details', $artist_festival->permalink)}}">{{$artist_festival->name}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="list-group-item">
            <strong>Géneros:</strong>
            <ul>
                @foreach($artist->genres as $artist_genre)
                    <li class="arrow-list-glyph">
                        <a href="#">{{$artist_genre->name}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
    <a href="{{action('AdminController@ArtistsList')}}" class="btn btn-default">Artistas</a>
    <a href="{{action('ArtistController@Edit', $permalink)}}" class="btn btn-default">Editar</a>
    <a href="{{action('ArtistController@DeleteConfirm', $permalink)}}" class="btn btn-default"
       data-toggle="confirmation" data-placement="top" data-singleton="true" data-popout="true"
       data-btn-cancel-label="Cancelar" data-btn-cancel-icon="glyphicon glyphicon-remove"
       data-btn-cancel-class="btn-danger"
       data-btn-ok-label="Eliminar" data-btn-ok-icon="glyphicon glyphicon-ok"
       data-btn-ok-class="btn-success"
       data-title="Estás seguro?" data-content="No podrás recuperarlo">Borrar</a>
    <script>
        $(function () {
            $('#home').removeClass('active');
            $('#artists').addClass('active');
        });
    </script>
@endsection