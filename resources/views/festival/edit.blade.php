@extends('admin.master')
@section('title', $festival->name)
@section('content')
    <h1 class="page-header">{{$festival->name}}: Editar</h1>
    @if(count($errors) > 0)
        <div class="alert alert-warning">
            <h3><span class="glyphicon glyphicon-exclamation-sign valign-top" aria-hidden="true"></span> No se ha podido
                editar el festival</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal" action="{{action('FestivalController@Update', $festival->permalink)}}" method="post">
        {{method_field('put')}}
        {{csrf_field()}}
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Nombre</label>
                <div class="col-md-4">
                    <input type="text" id="name" name="name" placeholder="Nombre del festival (debe ser único)"
                           class="form-control input-md" title="Nombre" value="{{$festival->name}}">
                    <span class="help-block">
                        <input class="form-control input-sm" type="text" id="permalink" name="permalink"
                               title="Permalink" value="{{$festival->permalink}}" readonly>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="location">Localización</label>
                <div class="col-md-4">
                    <input type="text" id="location" name="location" placeholder="Localidad en donde se celebra"
                           class="form-control input-md" title="Localidad" value="{{$festival->location}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="province">Provincia</label>
                <div class="col-md-4">
                    <input type="text" id="province" name="province" placeholder="Provincia española"
                           class="form-control input-md" title="Provincia" value="{{$festival->province}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="date">Fecha</label>
                <div class="col-md-4">
                    <input type="text" id="date" name="date" placeholder="Fecha en la que se celebra"
                           class="form-control input-md" title="Fecha" value="{{$festival->date}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="pathLogo">Logo del festival</label>
                <div class="col-md-4">
                    <label class="btn btn-default btn-file">
                        Seleccionar
                        <input type="file" class="hide" accept="image/gif, image/jpeg, image/png" id="pathLogo"
                               name="pathLogo" title="Logo del festival" value="{{$festival->pathLogo}}">
                    </label>
                    <span id="pathLogoFilename">{{$festival->pathLogo}}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="pathLogo">Cartel del festival</label>
                <div class="col-md-4">
                    <label class="btn btn-default btn-file">
                        Seleccionar
                        <input type="file" class="hide" accept="image/gif, image/jpeg, image/png" id="pathCartel"
                               name="pathCartel" title="Cartel del festival" value="{{$festival->pathHeader}}">
                    </label>
                    <span id="pathCartelFilename">{{$festival->pathHeader}}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="artists-add-button" class="col-md-4 control-label">Artistas</label>
                <div class="col-md-4">
                    <select class="selectpicker" name="artists[]" multiple title="Artistas" data-size="10"
                            data-dropup-auto="false" data-selected-text-format="count" data-live-search="true">
                        @foreach($artists as $artist)
                            <option value="{{$artist->id}}">{{$artist->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group"><label class="col-md-4 control-label">Géneros</label>
                <div class="col-md-4">
                    @foreach($genres as $genre)
                        <div class="checkbox">
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
    <script type="text/javascript">
        $(function () {
            $('#home').removeClass('active');
            $('#festivals').addClass('active');
            $('#pathLogo').change(function () {
                $('#pathLogoFilename').html($('#pathLogo').val().replace(/C:\\fakepath\\/i, ''));
            });
            $('#pathCartel').change(function () {
                $('#pathCartelFilename').html($('#pathCartel').val().replace(/C:\\fakepath\\/i, ''));
            });
            $('input[name=name]').on('input', function (e) {
                $('#permalink').val(slugify($('input[name=name]').val()));
            });
            $('.selectpicker').selectpicker('val', {!! $artists_ids !!});
        });
    </script>
@endsection