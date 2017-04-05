@extends('admin.master')

@section('title', $pluralSpanishModelName)
@section('content')
    <h1 class="page-header">{{$pluralSpanishModelName}}</h1>
    <div class="placeholders">
        <button class="btn btn-primary" onclick="location='{{action($modelName . 'Controller@FormNew')}}'">
            Añadir {{$spanishModelName}}
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
    </div>
    @if(!empty($models))
        <div class="table-bordered table-responsive">
            <table class="table .table-condensed table-striped table-hover">
                <thead>
                <tr>
                    @foreach($column_names as $column_name)
                        {{--Muestro como cabecera todos los nombres de columna de la tabla correspondiente--}}
                        <th>{{$column_name}}</th>
                    @endforeach
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
                            <td {!! strlen($model->$column_name) > 15 ? 'title="' . $model->$column_name . '"' : ''!!}>
                                {{strlen($model->$column_name) > 15
                                ? substr($model->$column_name, 0, 15) . '...'
                                : $model->$column_name}}
                            </td>
                        @endforeach
                        <td><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></td>
                        <td><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $models->links() }}
    @else
        <div class="alert alert-warning">
            <strong>Advertencia:</strong> No existe ningún {{lcfirst($spanishModelName)}} o no se pueden acceder a ellos
        </div>
    @endif
    <script src="{{ asset('js/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            $('#home').removeClass('active');
            $('#{{strtolower(str_plural($modelName))}}').addClass('active');
        });
    </script>
@endsection