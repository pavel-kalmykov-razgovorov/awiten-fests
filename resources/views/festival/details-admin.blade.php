@extends('admin.master')
@section('title', $festival->name)
@section('content')
    <h1 class="page-header">{{$festival->name}}</h1>
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
                <strong>{{$column_name}}:</strong> {{$festival->$column_name ?? "[null]"}}
            </li>
        @endforeach
        <li class="list-group-item">
            <strong>Artistas:</strong>
            <ul>
                @foreach($festival->artists as $festival_artist)
                    <li class="arrow-list-glyph">
                        <a href="{{action('ArtistController@DetailsAdmin', $festival_artist->permalink)}}">{{$festival_artist->name}}</a>
                        @if($festival_artist->pivot->confirmed == null)
                            <span class="label label-default">No confirmado</span>
                        @elseif($festival_artist->pivot->confirmed == true)
                            <span class="label label-success">Confirmado</span>
                        @else
                            <span class="label label-danger">Rechazado</span>
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
                        <a href="#">{{$festival_genre->name}}</a>
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