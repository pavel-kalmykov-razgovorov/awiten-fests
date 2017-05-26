@extends('admin.master')
@section('title', 'Añadir Artista')
@section('content')
<html res="{{ App::setlocale(session('lang'))}}">
    <h1 class="page-header">{{ trans('translate.añadirartista')}}</h1>
    @if(count($errors) > 0)
        <div class="alert alert-warning">
            <h3><span class="glyphicon glyphicon-exclamation-sign valign-top" aria-hidden="true"></span>{{ trans('translate.noañadirart')}}</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal" action="{{action('ArtistController@Create')}}" method="post"
          enctype="multipart/form-data">
        {{method_field('post')}}
        {{csrf_field()}}
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">{{ trans('translate.nombre')}}</label>
                <div class="col-md-4">
                    <input type="text" id="name" name="name" placeholder="Nombre del artista (debe ser único)"
                           class="form-control input-md" title="Nombre" value="{{old('name')}}">
                    <span class="help-block">
                        <input class="form-control input-sm" type="text" id="permalink" name="permalink"
                               title="Permalink" value="{{old('permalink') ?? 'permalink asociado al artista'}}"
                               readonly>
                    </span>
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
                <label class="col-md-4 control-label" for="website">Website</label>
                <div class="col-md-4">
                    <input type="text" id="website" name="website" placeholder="Página web personal"
                           class="form-control input-md" title="Sitio Web" value="{{old('website')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="country">{{ trans('translate.pais')}}</label>
                <div class="col-md-4">
                    <input type="text" id="country" name="country" placeholder="País de origen"
                           class="form-control input-md" title="País" value="{{old('country')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">{{ trans('translate.fotoperfil')}}</label>
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
                <label class="col-md-4 control-label">{{ trans('translate.fotocabecera')}}</label>
                <div class="col-md-4">
                    <label class="btn btn-default btn-file">
                        Seleccionar
                        <input type="file" class="hide" accept="image/gif, image/jpeg, image/png" id="pathHeader"
                               name="pathHeader" title="Foto de cabecera" value="{{old('pathHeader')}}">
                    </label>
                    <span id="pathHeaderFilename">{{old('pathHeader')}}</span>
                </div>
            </div>
            <div class="form-group"><label class="col-md-4 control-label">{{ trans('translate.generos')}}</label>
                <div class="col-md-4">
                    @if(session('genres')) <?php $genres = session('genres'); ?> @endif
                    @foreach($genres as $genre)
                        <div class="checkbox">
                            <input type="checkbox" name="genres[]" id="genre-{{$genre->id}}"
                                   value="{{$genre->id}}" {{$genre->checked ?? ''}}>
                            <label for="genre-{{$genre->id}}">{{$genre->name}}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="add-button"> </label>
                <div class="col-md-4">
                    <button id="add-button" name="add-button" class="btn btn-success">{{ trans('translate.añadir')}}</button>
                </div>
            </div>
        </fieldset>
    </form>
    <script type="text/javascript">
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
