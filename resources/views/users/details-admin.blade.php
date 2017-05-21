@extends('admin.master')
@section('title', $user->name)
@section('content')
    <h1 class="page-header">{{$user->name}}</h1>
    @if(session('created') != null)
        <div class="alert {{session('created') ? 'alert-success' : 'alert-warning'}}">
            @if(session('created')) {{$user->name}} se ha creado correctamente.
            @else {{$user->name}} no se ha podido crear. Probablemente ya exista en la base de datos.
            @endif
        </div>
    @endif
    @if(session('updated') != null)
        <div class="alert {{session('updated') ? 'alert-success' : 'alert-warning'}}">
            @if(session('updated')) {{$user->name}} se ha modificado correctamente.
            @else {{$user->name}} no se ha podido modificar. Probablemente ya exista en la base de datos.
            @endif
        </div>
    @endif
    <ul class="list-group">
    @foreach($column_names as $column_name)
        <li class="list-group-item">
            <strong>{{$column_name}}:</strong> {{$user->$column_name ?? "[null]"}}
        </li>
   @endforeach
   </ul>
    <a href="{{action('AdminController@UsersList')}}" class="btn btn-default">Usuarios</a>
    <a href="{{action('UserController@Delete', $name)}}" class="btn btn-default"
       data-toggle="confirmation" data-placement="top" data-singleton="true" data-popout="true"
       data-btn-cancel-label="Cancelar" data-btn-cancel-icon="glyphicon glyphicon-remove"
       data-btn-cancel-class="btn-danger"
       data-btn-ok-label="Eliminar" data-btn-ok-icon="glyphicon glyphicon-ok"
       data-btn-ok-class="btn-success"
       data-title="Estás seguro?" data-content="No podrás recuperarlo">Borrar</a>
    <script>
        $(function () {
            $('#home').removeClass('active');
            $('#users').addClass('active');
        });
    </script>
@endsection