@extends('admin.master')
@section('title', $genre->name)
@section('content')
    <h1 class="page-header">{{$genre->name}}: Editar</h1>
    @if(count($errors) > 0)
        <div class="alert alert-warning">
            <h3><span class="glyphicon glyphicon-exclamation-sign valign-top" aria-hidden="true"></span> No se ha podido
                editar el género</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal" action="{{action('GenreController@Update', $permalink)}}" method="post">
        {{method_field('put')}}
        {{csrf_field()}}
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Nombre</label>
                <div class="col-md-4">
                    <input type="text" id="name" name="name" placeholder="Nombre del género (debe ser único)"
                           class="form-control input-md" title="Nombre" value="{{$genre->name}}">
                    <span class="help-block">
                        <input class="form-control input-sm" type="text" id="permalink" name="permalink"
                               title="Permalink" value="{{$genre->permalink}}" readonly>
                    </span>
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
        function addEntry() {
            document.querySelector('#festivals-list').appendChild(
                document.importNode(document.querySelector('#festival-entry').content, true)
            );
        }

        function removeEntry(elem) {
            elem.parentNode.parentNode.parentNode.remove();
        }
        $(function () {
            $('#home').removeClass('active');
            $('#genres').addClass('active');
            $('input[name=name]').on('input', function (e) {
                $('#permalink').val(slugify($('input[name=name]').val()));
            });
        });
    </script>
@endsection
