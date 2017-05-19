@extends('admin.master')
@section('title', 'Editar Perfil')
@section('content')
    <h1 class="page-header">{{$user->name}}: Editar Perfil</h1>
    @if($update = Session::get('Update'))
        <div class="alert alert-success">
        {{ $update }}
        </div>
    @endif
    @if(count($errors) > 0)
        <div class="alert alert-warning">
            <h3><span class="glyphicon glyphicon-exclamation-sign valign-top" aria-hidden="true"></span> No se ha podido editar el usuario</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal" action="{{action('UserController@Update')}}" method="post">
        {{method_field('put')}}
        {{csrf_field()}}
        <fieldset>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="name">Nombre</label>
                    <div class="col-md-4">
                        <input type="text" id="name" name="name" placeholder="Nombre del usuario"
                            class="form-control input-md" title="Nombre" value="{{old('name', $user->name)}}">
                    </div>
                </div>
            </div>
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="username">Usuario</label>
                    <div class="col-md-4">
                        <input type="text" id="username" name="username" placeholder="El usuario debe ser único"
                            class="form-control input-md" title="Usuario" value="{{old('username', $user->username)}}">
                    </div>
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">E-mail</label>
                    <div class="col-md-4">
                        <input type="text" id="email" name="email" placeholder="El email debe ser único"
                            class="form-control input-md" title="email" value="{{old('email',$user->email)}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="save-button"> </label>
                <div class="col-md-4">
                    <button id="save-button" name="save-button" class="btn btn-success">Guardar Cambios</button>
                </div>
            </div>
        </fieldset>
    </form>
    <script type="text/javascript">
        $(function () {
            $('#home').removeClass('active');
            $('#profile').addClass('active');
        });
    </script>
@endsection
