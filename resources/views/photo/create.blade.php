@extends('admin.master')
@section('title', 'Añadir fotos -')
@section('content')
    <h1 class="page-header">Añadir fotos a álbum</h1>
    @if(count($errors) > 0)
        <div class="alert alert-warning">
            <h3><span class="glyphicon glyphicon-exclamation-sign valign-top" aria-hidden="true"></span> No se han
                podido
                añadir las fotos</h3>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form-horizontal" action="{{action('PhotoController@Create')}}" method="post"
          enctype="multipart/form-data">
        {{method_field('post')}}
        {{--{{csrf_field()}}--}}
        <fieldset>
            <div class="form-group">
                <label class="col-md-4 control-label" for="festival">Festival</label>
                <div class="col-md-4" id="festival-div">
                    <select class="selectpicker" id="festival" name="festival" title="Festival" data-size="10"
                            data-live-search="true">
                        @foreach($festivals as $festival)
                            <option value="{{$festival->id}}">{{$festival->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="images">Seleccionar Imágenes</label>
                <div class="col-md-6">
                    <input id="input-image" name="input-image[]" multiple type="file" class="file-loading"
                           accept="image/*" data-language="es">
                </div>
            </div>

        </fieldset>
    </form>
    <script type="text/javascript">
        $(function () {
            $('#home').removeClass('active');
            $('#photos').addClass('active');
            $('input[name=title]').on('input', function () {
                $('#permalink').val(slugify($('input[name=title]').val()));
            });
            let selectpicker = $('.selectpicker');
            let input = $("#input-image");
            input.fileinput('disable');
            selectpicker.selectpicker('val', {{ old('festival') }});
            selectpicker.change(function () {
                input.fileinput('destroy');
                let fInputOpts = {
                    uploadUrl: "{{ action('PhotoController@Create') }}",
                    allowedFileType: "image",
                    maxImageWidth: 1400,
                    resizeImage: true,
                    browseLabel: "Escoger Imágenes",
                    browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
                    removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
                    uploadIcon: "<i class=\"glyphicon glyphicon-upload\"></i> ",
                    uploadExtraData: {
                        _token: "{{csrf_token()}}",
                        festival: $('#festival').val()
                    }
                };
                input.fileinput(fInputOpts);
                input.fileinput('enable');
            });
        });
    </script>
@endsection
