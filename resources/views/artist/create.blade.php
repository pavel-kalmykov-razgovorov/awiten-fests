@extends('admin.master')
@section('title', 'Añadir Artista')
@section('content')
    <h1 class="page-header">Añadir Artista</h1>
    @if(count($errors) > 0)
        <div class="alert alert-warning">
            <h3><span class="glyphicon glyphicon-exclamation-sign valign-top" aria-hidden="true"></span> No se ha podido
                añadir el artista</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal" action="{{action('ArtistController@Create')}}" method="post">
        {{method_field('post')}}
        {{csrf_field()}}
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Nombre</label>
                <div class="col-md-4">
                    <input type="text" id="name" name="name" placeholder="Nombre del artista (debe ser único)"
                           class="form-control input-md" title="Nombre" value="{{old('name')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="soundcloud">Soundcloud</label>
                <div class="col-md-4">
                    <input type="text" id="soundcloud" name="soundcloud" placeholder="URL de tu perfil de Soundcloud"
                           class="form-control input-md" title="SoundCloud" value="{{old('soundcloud')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="website">Sitio Web</label>
                <div class="col-md-4">
                    <input type="text" id="website" name="website" placeholder="Página web personal"
                           class="form-control input-md" title="Sitio Web" value="{{old('website')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">País</label>
                <div class="col-md-4">
                    <input type="text" id="country" name="country" placeholder="País de origen"
                           class="form-control input-md" title="País" value="{{old('country')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="pathProfile">Foto de perfil</label>
                <div class="col-md-4">
                    <label class="btn btn-default btn-file">
                        Seleccionar
                        <input type="file" class="hide" accept="image/gif, image/jpeg, image/png" id="pathProfile"
                               name="pathProfile" title="Foto de perfil" value="{{old('pathProfile')}}">
                    </label>
                    <span id="pathProfileFilename">{{old('pathProfile')}}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="pathHeader">Foto de cabecera</label>
                <div class="col-md-4">
                    <label class="btn btn-default btn-file">
                        Seleccionar
                        <input type="file" class="hide" accept="image/gif, image/jpeg, image/png" id="pathHeader"
                               name="pathHeader" title="Foto de cabecera" value="{{old('pathHeader')}}">
                    </label>
                    <span id="pathHeaderFilename">{{old('pathHeader')}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="festivals-add-button" class="col-md-4 control-label">Festivales</label>
                <div class="col-md-4">
                    <input class="btn btn-default" id="festivals-add-button" type="button" onclick="addEntry()"
                           value="Nuevo festival"/>
                    <ul id="festivals-list">
                        @foreach (array_unique(session('temp-festivals') ?? []) as $temp_festival)
                            <li class="list-unstyled">
                                <div class="input-group">
                                    <select class="form-control" name="festivals-select[]" title="Opciones de festival">
                                        @foreach ($festivals as $festival)
                                            @if($temp_festival == $festival->id)
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
                <label class="col-md-4 control-label" for="add-button"> </label>
                <div class="col-md-4">
                    <button id="add-button" name="add-button" class="btn btn-success">Añadir</button>
                </div>
            </div>
        </fieldset>
    </form>
    <template id="festival-entry">
        <li class="list-unstyled">
            <div class="input-group">
                <select class="form-control" name="festivals-select[]" title="Opciones de festival">
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
                document.importNode(document.querySelector('#festival-entry').content, true));
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
        });
    </script>
@endsection
