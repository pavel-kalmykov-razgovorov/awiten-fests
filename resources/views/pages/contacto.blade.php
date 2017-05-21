@extends('welcome')
@section('mainContent')
    <div class="arreglar-margen">
        <div class="row" style="margin-bottom: 3em; color: #1BBD36">
            <div class="col-md-12">
                <h1>Contacta con AwitenFests</h1>
                <hr>
                <form action="{{ url('contacto') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email de contacto</label>
                        <input id="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="subject">Asunto:</label>
                        <input id="subject" name="subject" class="form-control" title="email">
                    </div>

                    <div class="form-group">
                        <label for="message">Mensaje:</label>
                        <textarea id="message" name="message" class="form-control"
                                  placeholder="Escribe tu mensaje aquí..."></textarea>
                    </div>
                    <input type="submit" value="Send Message" class="btn">
                </form>
            </div>
        </div>
    </div>
@endsection