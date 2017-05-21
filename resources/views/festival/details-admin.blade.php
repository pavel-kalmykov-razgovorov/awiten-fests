@extends('admin.master')
@section('title', "$festival->name -")
@section('content')
    <a href="{{action('FestivalController@Details', $festival->permalink)}}">
        <h1 class="page-header">{{$festival->name}}</h1>
    </a>
    @if(session('created') != null)
        <div class="alert {{session('created') ? 'alert-success' : 'alert-warning'}}">
            @if(session('created')) {{$festival->date}} se ha creado correctamente.
            @else {{$festival->name}} no se ha podido crear. Probablemente ya exista en la base de datos.
            @endif
        </div>
    @endif
    @if(session('updated') != null)
        <div class="alert {{session('updated') ? 'alert-success' : 'alert-warning'}}">
            @if(session('updated')) {{$festival->name}} se ha modificado correctamente.
            @else {{$festival->name}} no se ha podido modificar. Probablemente ya exista en la base de datos.
            @endif
        </div>
    @endif
    <ul class="list-group">
        @foreach($column_names as $column_name)
            <li class="list-group-item">
                @if($column_name == 'pathLogo' && $festival->$column_name != null)
                    <strong>{{$column_name}}:</strong>
                    <a rel="popover" data-trigger="focus" tabindex="0" data-placement="right"
                       data-img="{{ route('festival.image', ['permalink' => $festival->permalink, 'filename' => $festival->$column_name]) }}">
                        {{$festival->$column_name}}
                    </a>
                @elseif(in_array($column_name,['location', 'province']) && $festival->$column_name != null)
                    <strong>{{$column_name}}:</strong>
                    <a href="{{ "https://www.google.es/maps/place/" . $festival->$column_name }}" target="_blank">
                        {{$festival->$column_name}}
                    </a>
                @else
                    <strong>{{$column_name}}:</strong> {{$festival->$column_name ?? "[null]"}}
                @endif
            </li>
        @endforeach
        <li class="list-group-item">
            <strong>Artistas:</strong>
            <ul>
                @foreach($festival->artists as $festival_artist)
                    <li class="arrow-list-glyph">
                        <a href="{{action('ArtistController@Details', $festival_artist->permalink)}}">{{$festival_artist->name}}</a>
                        @if($festival_artist->pivot->confirmed == null)
                            <span class="label label-default label-xxs">No confirmado</span>
                        @elseif($festival_artist->pivot->confirmed == true)
                            <span class="label label-success label-xxs">Confirmado</span>
                        @else
                            <span class="label label-danger label-xxs">Rechazado</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="list-group-item">
            <strong>Géneros:</strong>
            <ul>
                @foreach($festival->genres as $festival_genre)
                    <li class="arrow-list-glyph">
                        <a href="{{action('FestivalController@listByGenre', $festival_genre->permalink)}}">{{$festival_genre->name}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
    </ul>
    <a href="{{action('AdminController@FestivalsList')}}" class="btn btn-default">Festivales</a>
    <a href="{{action('FestivalController@Edit', $permalink)}}" class="btn btn-default">Editar</a>
    <a href="{{action('FestivalController@Delete', $permalink)}}" class="btn btn-default"
       data-toggle="confirmation" data-placement="top" data-singleton="true" data-popout="true"
       data-btn-cancel-label="Cancelar" data-btn-cancel-icon="glyphicon glyphicon-remove"
       data-btn-cancel-class="btn-danger"
       data-btn-ok-label="Eliminar" data-btn-ok-icon="glyphicon glyphicon-ok"
       data-btn-ok-class="btn-success"
       data-title="Estás seguro?" data-content="No podrás recuperarlo">Borrar</a>
    <script>
        $(function () {
            $('#home').removeClass('active');
            $('#festivals').addClass('active');
        });
    </script>
@endsection