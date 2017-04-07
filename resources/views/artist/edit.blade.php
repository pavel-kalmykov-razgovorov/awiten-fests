@extends('admin.master')
@section('title', $artist->name)
@section('content')
    <h1 class="page-header">{{$artist->name}}: Editar</h1>
    @if(count($errors) > 0)
        <div class="alert alert-warning">
            <h3><span class="glyphicon glyphicon-exclamation-sign valign-top" aria-hidden="true"></span> No se ha podido
                editar el artista</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal" action="{{action('ArtistController@Update', $permalink)}}" method="post">
        {{method_field('put')}}
        {{csrf_field()}}
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Nombre</label>
                <div class="col-md-4">
                    <input type="text" id="name" name="name" placeholder="Nombre del artista (debe ser único)"
                           class="form-control input-md" title="Nombre" value="{{$artist->name}}">
                    <span class="help-block">
                        <input class="form-control input-sm" type="text" id="permalink" name="permalink"
                               title="Permalink" value="{{$artist->permalink}}"
                               readonly>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="soundcloud">Soundcloud</label>
                <div class="col-md-4">
                    <input type="text" id="soundcloud" name="soundcloud" placeholder="URL de tu perfil de Soundcloud"
                           class="form-control input-md" title="SoundCloud" value="{{$artist->soundcloud}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="website">Sitio Web</label>
                <div class="col-md-4">
                    <input type="text" id="website" name="website" placeholder="Página web personal"
                           class="form-control input-md" title="Sitio Web" value="{{$artist->website}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">País</label>
                <div class="col-md-4">
                    <input type="text" id="country" name="country" placeholder="País de origen"
                           class="form-control input-md" title="País" value="{{$artist->country}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="pathProfile">Foto de perfil</label>
                <div class="col-md-4">
                    <label class="btn btn-default btn-file">
                        Seleccionar
                        <input type="file" class="hide" accept="image/gif, image/jpeg, image/png" id="pathProfile"
                               name="pathProfile" title="Foto de perfil" value="{{$artist->pathProfile}}">
                    </label>
                    <span id="pathProfileFilename">{{$artist->pathProfile}}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="pathHeader">Foto de cabecera</label>
                <div class="col-md-4">
                    <label class="btn btn-default btn-file">
                        Seleccionar
                        <input type="file" class="hide" accept="image/gif, image/jpeg, image/png" id="pathHeader"
                               name="pathHeader" title="Foto de cabecera" value="{{$artist->pathHeader}}">
                    </label>
                    <span id="pathHeaderFilename">{{$artist->pathHeader}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="festivals-add-button" class="col-md-4 control-label">Festivales</label>
                <div class="col-md-4">
                    <input class="btn btn-default" id="festivals-add-button" type="button" onclick="addEntry()"
                           value="Nuevo festival"/>
                    <ul id="festivals-list">
                        @foreach ($artist->festivals as $artist_festival)
                            <li class="list-unstyled">
                                <div class="input-group">
                                    <select class="form-control" name="festivals[]" title="Opciones de festival">
                                        @foreach ($festivals as $festival)
                                            @if($artist_festival->id == $festival->id)
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
            <div class="form-group"><label class="col-md-4 control-label">Géneros</label>
                <div class="col-md-4">
                    @foreach($genres as $genre)
                        <div class="checkbox checkbox-inline">
                            <input type="checkbox" name="genres[]" id="genre-{{$genre->id}}"
                                   value="{{$genre->id}}" {{$genre->checked}}>
                            <label for="genre-{{$genre->id}}">{{$genre->name}}</label>
                        </div>
                    @endforeach
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
            $('#artists').addClass('active');
            $('#pathProfile').change(function () {
                $('#pathProfileFilename').html($('#pathProfile').val().replace(/C:\\fakepath\\/i, ''));
            });
            $('#pathHeader').change(function () {
                $('#pathHeaderFilename').html($('#pathHeader').val().replace(/C:\\fakepath\\/i, ''));
            });
            $('input[name=name]').on('input', function (e) {
                $('#permalink').val(slugify($('input[name=name]').val()));
            });
        });
    </script>
@endsection
