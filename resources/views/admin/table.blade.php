@extends('admin.master')
@section('title', $pluralSpanishModelName)
@section('content')
    <h1 class="page-header">{{$pluralSpanishModelName}}</h1>
    @if(session('deleted') != null)
        <div class="alert {{session('deleted') ? 'alert-success' : 'alert-warning'}}">
            @if(session('deleted')) El {{strtolower($spanishModelName)}} se ha eliminado correctamente.
            @else El {{strtolower($spanishModelName)}} no se ha podido eliminar. Probablemente ya no exista en la base
            de datos.
            @endif
        </div>
    @endif
    @if($locked = Session::get('locked'))
        <div class="alert alert-danger">
        {{ $locked }}
        </div>
    @endif
    @if($unlocked = Session::get('unlocked'))
        <div class="alert alert-success">
        {{ $unlocked }}
        </div>
    @endif
    <div class="placeholders">
        <button class="btn btn-primary" onclick="location='{{action($modelName . 'Controller@FormNew')}}'">
            Añadir {{$spanishModelName}}
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
    </div>
    @if(!empty($models))
        <div class="table-bordered table-responsive">
            <table class="table table-condensed table-striped table-hover models-table" id="table">
                <thead>
                <tr>
                    @foreach($column_names as $column_name)
                        {{--Muestro como cabecera todos los nombres de columna de la tabla correspondiente--}}
                        <th>{{$column_name}}</th>
                    @endforeach
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($models as $model)
                    <tr>
                        @foreach($column_names as $column_name)
                            {{--Cogiendo cada nombre de columna puedo mostrar todos los atributos de un modelo en un for--}}

                            {{--Muestro el contenido de la celda completo si no pasa de 15 caracteres; si no,
                            lo acorto seguido de puntos suspensivos y le pongo al td el atributo title
                            para que salga un globo al poner el ratón por encima.

                            Así, me aseguro de que todos los campos ocupan lo mismo y la tabla no se vuelve tan grande--}}
                            @if(session('sonUsuarios') && $model->locked == true)
                                <td class="bg-danger" onclick="location = '{{action($modelName . 'Controller@DetailsAdmin', $model->username)}}'"
                                    {!! strlen($model->$column_name) > 15 ? 'title="' . $model->$column_name . '"' : ''!!}>
                            @elseif(session('sonUsuarios') && $model->locked == false)
                                <td onclick="location = '{{action($modelName . 'Controller@DetailsAdmin', $model->username)}}'"
                                    {!! strlen($model->$column_name) > 15 ? 'title="' . $model->$column_name . '"' : ''!!}>
                            @else
                                <td onclick="location = '{{action($modelName . 'Controller@DetailsAdmin', $model->permalink)}}'"
                                    {!! strlen($model->$column_name) > 15 ? 'title="' . $model->$column_name . '"' : ''!!}>
                            @endif
                                {{strlen($model->$column_name) > 15
                                    ? substr($model->$column_name, 0, 15) . '...'
                                    : $model->$column_name}}
                                </td>
                        @endforeach
                        <td>
                            @if(session('sonUsuarios'))
                                <a href="{{action($modelName . 'Controller@Lock', $model->username)}}"
                               data-toggle="confirmation" data-placement="left" data-singleton="true" data-popout="true"
                               data-btn-cancel-label="Cancelar" data-btn-cancel-icon="glyphicon glyphicon-remove"
                               data-btn-cancel-class="btn-danger"
                               data-btn-ok-label="Bloquear" data-btn-ok-icon="glyphicon glyphicon-lock"
                               data-btn-ok-class="btn-success"
                               data-title="Estás seguro?" data-content="El usuario no podrá acceder a su cuenta.">
                               <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                </a>     
                            @else
                                <a href="{{action($modelName . 'Controller@Edit', $model->permalink)}}">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>
                            @endif
                        </td>
                        <td>
                            @if(session('sonUsuarios'))
                                <a href="{{action($modelName . 'Controller@Delete', $model->username)}}"
                                   data-toggle="confirmation" data-placement="left" data-singleton="true" data-popout="true"
                                   data-btn-cancel-label="Cancelar" data-btn-cancel-icon="glyphicon glyphicon-remove"
                                   data-btn-cancel-class="btn-danger"
                                   data-btn-ok-label="Eliminar" data-btn-ok-icon="glyphicon glyphicon-ok"
                                   data-btn-ok-class="btn-success"
                                   data-title="Estás seguro?" data-content="No podrás recuperarlo">
                               <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                </a>
                            @else
                                <a href="{{action($modelName . 'Controller@Delete', $model->permalink)}}"
                                   data-toggle="confirmation" data-placement="left" data-singleton="true" data-popout="true"
                                   data-btn-cancel-label="Cancelar" data-btn-cancel-icon="glyphicon glyphicon-remove"
                                   data-btn-cancel-class="btn-danger"
                                   data-btn-ok-label="Eliminar" data-btn-ok-icon="glyphicon glyphicon-ok"
                                   data-btn-ok-class="btn-success"
                                   data-title="Estás seguro?" data-content="No podrás recuperarlo">
                                <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                                </a>
                             @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-warning">
            <strong>Advertencia:</strong> No existe ningún {{lcfirst($spanishModelName)}} o no se pueden acceder a ellos
        </div>
    @endif
    <script>
        $(function () {
            $('#home').removeClass('active');
            $('#{{strtolower(str_plural($modelName))}}').addClass('active');
            $('[data-toggle=confirmation]').confirmation({
                rootSelector: '[data-toggle=confirmation]'
                // other options
            });
        });
    </script>

@endsection