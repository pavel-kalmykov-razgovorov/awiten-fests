@extends('welcome')
@section('mainContent')

<html res="{{ App::setlocale(session('lang'))}}">    
    <div class="arreglar-margen">
        <div class="row" style="margin-bottom: 3em; color: #1BBD36">

            <div class="col-md-12">
                <h1>{{trans('translate.contacta')}} Awiten Fests</h1>
                <hr>
                <form action="{{ url('contacto') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">

                        <label for="email">{{trans('translate.contactemail')}}:</label>

                        <input id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">

                        <label for="subject">{{trans('translate.asunto')}}:</label>
                        <input id="subject" name="subject" class="form-control" title="email">
                    </div>

                    <div class="form-group">
                        <label for="message">{{trans('translate.mensaje')}}:</label>
                        <textarea id="message" name="message" class="form-control"
                                  placeholder="{{trans('translate.escribemensaje')}}"></textarea>
                    </div>
                    <input type="submit" value="{{trans('translate.enviarms')}}" class="btn">

                </form>
            </div>
        </div>
    </div>
@endsection