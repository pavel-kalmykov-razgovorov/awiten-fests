@extends('admin.master')
@section('title', $post->name)
@section('content')
    <h1 class="page-header">{{$post->name}}</h1>
    @if(session('created') != null)
        <div class="alert {{session('created') ? 'alert-success' : 'alert-warning'}}">
            @if(session('created')) {{$post->name}} se ha creado correctamente.
            @else {{$post->name}} no se ha podido crear. Probablemente ya exista en la base de datos.
            @endif
        </div>
    @endif
    @if(session('updated') != null)
        <div class="alert {{session('updated') ? 'alert-success' : 'alert-warning'}}">
            @if(session('updated')) {{$post->name}} se ha modificado correctamente.
            @else {{$post->name}} no se ha podido modificar. Probablemente ya exista en la base de datos.
            @endif
        </div>
    @endif
    <ul class="list-group">
        @foreach($column_names as $column_name)
            <li class="list-group-item">
                <strong>{{$column_name}}:</strong> {{$post->$column_name ?? "[null]"}}
            </li>
        @endforeach
    </ul>
    <a href="{{action('AdminController@PostsList')}}" class="btn btn-default">Posts</a>
    <a href="{{action('PostController@Edit', $permalink)}}" class="btn btn-default">Editar</a>
    <a href="{{action('PostController@DeleteConfirm', $permalink)}}" class="btn btn-default"
       data-toggle="confirmation" data-placement="top" data-singleton="true" data-popout="true"
       data-btn-cancel-label="Cancelar" data-btn-cancel-icon="glyphicon glyphicon-remove"
       data-btn-cancel-class="btn-danger"
       data-btn-ok-label="Eliminar" data-btn-ok-icon="glyphicon glyphicon-ok"
       data-btn-ok-class="btn-success"
       data-title="Estás seguro?" data-content="No podrás recuperarlo">Borrar</a>
    <script>
        $(function () {
            $('#home').removeClass('active');
            $('#posts').addClass('active');
        });
    </script>
@endsection