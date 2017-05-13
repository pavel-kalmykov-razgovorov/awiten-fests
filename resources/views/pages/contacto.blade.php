@extends('welcome')
@section('mainContent')
<div class="arreglar-margen">
<div class="row">
            <div class="col-md-12">
                <h1>Contacta con AwitenFests</h1>
                <hr>
                <form action="{{ url('contacto') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name="email"><h5>Email de contacto<h5></label>
                        <input id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="subject"><h5>Asunto:</h5></label>
                        <input id="subject" name="subject" class="form-control">
                    </div>

                    <div class="form-group">
                        <label name="message"><h5>Mensaje:</h5></label>
                        <textarea id="message" name="message" class="form-control">Escribe tu mensaje aquí...</textarea>
                    </div>
                    <input type="submit" value="Send Message" class="btn btn-success">
                    </br>
                    </br>
                </form>
            </div>
        </div>

   

</div>
@endsection