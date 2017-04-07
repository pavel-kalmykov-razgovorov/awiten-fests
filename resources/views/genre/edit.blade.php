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
                    <input type="text" id="name" name="name" placeholder="Nombre del artista (debe ser único)"
                           class="form-control input-md" title="Nombre" value="{{$genre->name}}">
                    <span class="help-block">
                        <input class="form-control input-sm" type="text" id="permalink" name="permalink"
                               title="Permalink" value="{{$genre->permalink}}" readonly>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label for="festivals-add-button" class="col-md-4 control-label">Festivales</label>
                <div class="col-md-4">
                    <input class="btn btn-default" id="festivals-add-button" type="button" onclick="addEntry()"
                           value="Nuevo festival"/>
                    <ul id="festivals-list">
                        @foreach ($genre->festivals as $genre_festival)
                            <li class="list-unstyled">
                                <div class="input-group">
                                    <select class="form-control" name="festivals-select[]" title="Opciones de festival">
                                        @foreach ($festivals as $festival)
                                            @if($genre_festival->id == $festival->id)
                                                <option value="{{$festival->id}}" selected>{{$festival->name}}</option>
                                            @else
                                                <option value="{{$festival->id}}">{{$festival->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" onclick="removeEntry(this)">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        </button>
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="form-group">
                <label for="artists-add-button" class="col-md-4 control-label">Artistas</label>
                <div class="col-md-4">
                    <input class="btn btn-default" id="artists-add-button" type="button" onclick="addEntry()"
                           value="Nuevo artista"/>
                    <ul id="artists-list">
                        @foreach ($genre->artists as $genre_artist)
                            <li class="list-unstyled">
                                <div class="input-group">
                                    <select class="form-control" name="artists-select[]" title="Opciones de artista">
                                        @foreach ($artists as $artist)
                                            @if($genre_artist->id == $artist->id)
                                                <option value="{{$artist->id}}" selected>{{$artist->name}}</option>
                                            @else
                                                <option value="{{$artist->id}}">{{$artist->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" onclick="removeEntry(this)">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        </button>
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
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
    <template id="festival-entry">
        <li class="list-unstyled">
            <div class="input-group">
                <select class="form-control" name="festivals[]" title="Opciones de festival">
                    @forelse ($festivals as $festival)
                        <option value="{{$festival->id}}">{{$festival->name}}</option>
                    @empty
                        <option disabled>No hay festivales registrados</option>
                    @endforelse
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-danger" onclick="removeEntry(this)">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </span>
            </div>
        </li>
    </template>
    <template id="artist-entry">
        <li class="list-unstyled">
            <div class="input-group">
                <select class="form-control" name="artists[]" title="Lista de Artistas">
                    @forelse ($artists as $artist)
                        <option value="{{$artist->id}}">{{$artist->name}}</option>
                    @empty
                        <option disabled>No hay artistas registrados</option>
                    @endforelse
                </select>
                <span class="input-group-btn">
                    <button class="btn btn-danger" onclick="removeEntry(this)">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </span>
            </div>
        </li>
    </template>
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
