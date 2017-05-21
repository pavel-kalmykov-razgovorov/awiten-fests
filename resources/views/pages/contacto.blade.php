@extends('welcome')
@section('mainContent')
<div class="arreglar-margen">
<div class="row">
            <div class="col-md-12">
                <h1>{{trans('translate.contacta')}} Awiten Fests</h1>
                <hr>
                <form action="{{ url('contacto') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name="email"><h5>{{trans('translate.contactemail')}}:<h5></label>
                        <input id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="subject"><h5>{{trans('translate.asunto')}}:</h5></label>
                        <input id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="message"><h5>{{trans('translate.mensaje')}}:</h5></label>
                        <textarea id="message" name="message" class="form-control">{{trans('translate.escribemensaje')}}</textarea>
                    </div>
                    <input type="submit" value="{{trans('translate.enviarms')}}" class="btn btn-success">
                    </br>
                    </br>
                </form>
            </div>
        </div>

   

</div>
@endsection