@extends('welcome')

@section('mainContent')
<div class="arreglar-margen">
<div class="container">
    <div class="row">
      <div class="alert alert-info">
       <h1> {{trans('translate.regcorrecto')}} </h1>
       <h2> {{trans('translate.confcorreo')}} </h2>
      </div>
    </div>
</div>
</div>
@endsection
