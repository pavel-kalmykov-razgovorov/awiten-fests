@extends('admin.master')
@section('title', 'Crear Festival')
@section('content')
<html res="{{ App::setlocale(session('lang'))}}">
    <h1 class="page-header">{{ trans('translate.newfest')}}</h1>
    @if(count($errors) > 0)
        <div class="alert alert-warning">
            <h3><span class="glyphicon glyphicon-exclamation-sign valign-top" aria-hidden="true"></span>{{ trans('translate.nocrearfest')}}</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal" action="{{action('FestivalController@Create')}}" method="post"
          enctype="multipart/form-data">
        {{method_field('post')}}
        {{csrf_field()}}
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">{{ trans('translate.nombre')}}</label>
                <div class="col-md-4">
                    <input type="text" id="name" name="name" placeholder="Nombre del festival (debe ser único)"
                           class="form-control input-md" title="Nombre" value="{{old('name')}}">
                    <span class="help-block">
                        <input class="form-control input-sm" type="text" id="permalink" name="permalink"
                               title="Permalink" value="{{old('permalink') ?? 'permalink asociado al festival'}}"
                               readonly>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="location">{{ trans('translate.location')}}</label>
                <div class="col-md-4">
                    <input type="text" id="location" name="location" placeholder="Localidad en donde se celebra"
                           class="form-control input-md" title="Localidad" value="{{old('location')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="province">{{ trans('translate.provincia')}}</label>
                <div class="col-md-4">
                    <input type="text" id="province" name="province" placeholder="Provincia española"
                           class="form-control input-md" title="Provincia" value="{{old('provincia')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="date">{{ trans('translate.fecha')}}</label>
                <div class="col-md-4">
                    <input type="text" id="date" name="date" placeholder="Fecha en la que se celebra (dd/mm/yyyy)"
                           class="form-control input-md" title="Fecha" value="{{old('date')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">{{ trans('translate.logo')}}</label>
                <div class="col-md-4">
                    <label class="btn btn-default btn-file">
                        Seleccionar
                        <input type="file" class="hide" accept="image/gif, image/jpeg, image/png" id="pathLogo"
                               name="pathLogo" title="Logo del festival" value="{{old('pathLogo')}}">
                    </label>
                    <span id="pathLogoFilename">{{old('pathLogo')}}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">{{ trans('translate.artistas')}}</label>
                <div class="col-md-4">
                    <select class="selectpicker" name="artists[]" multiple title="Artistas" data-size="10"
                            data-dropup-auto="false" data-selected-text-format="count" data-live-search="true">
                        @foreach($artists as $artist)
                            <option value="{{$artist->id}}">{{$artist->name}}</option>
                        @endforeach
                    </select>
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
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <button id="save-button" name="save-button" class="btn btn-success">{{ trans('translate.añadir')}}</button>
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
            $('.selectpicker').selectpicker('val', {!! json_encode(old('artists')) !!});
        });
    </script>
@endsection