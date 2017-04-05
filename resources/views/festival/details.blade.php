

@section('mainContent')
<div class="arreglar-margen">

<h1 class=".text-center">Detalles Festival</h1>
@if(session('created'))
    <h3>El festival se ha creado correctamente</h3>
@endif
@if(session('updated'))
    <h3>El festival se ha modificado correctamente</h3>
@endif
<ul>
    <li>Nombre: {{$festival->name}}</li>
    <li>Ruta logo: {{$festival->pathLogo}}</li>
    <li>Ruta cartel: {{$festival->pathCartel}}</li>
</ul>
<div class="container">
    	<div class="row">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
              @if ($festival->photos()->count() != 0)
                <div class="item active">
                    <img src="{{$festival->photos->get(0)->path}}" alt="400" width="1000">
                </div>
            @endif
            @for ($i = 1; $i < $festival->photos()->count(); $i++)
                <div class="item">
                    <img src="{{$festival->photos->get($i)->path}}" alt="400" width="1000">
                </div>
                @endfor
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>

    <!--li>Localizacion: {{$festival->location}}</li>
    <li>Provincia: {{$festival->province}}</li>
    <li>Fecha: {{\Carbon\Carbon::parse($festival->date)->format('d/m/Y')}}</li-->

    <div class="container">
    	<div class="row">
			<div class="[ col-xs-2 col-sm-offset-2 col-sm-2 ]">
				<ul class="event-list">
					<li>
						<time datetime="{{\Carbon\Carbon::parse($festival->date)->format('d/m/Y')}}">
							<span class="day">{{\Carbon\Carbon::parse($festival->date)->format('d')}}</span>
							<span class="month">{{\Carbon\Carbon::parse($festival->date)->format('m/Y')}}</span>
							<span class="year">{{\Carbon\Carbon::parse($festival->date)->format('Y')}}</span>
							<span class="time">ALL DAY</span>
						</time>
						<div class="info">
							<h2 class="title">{{$festival->province}} </h2>
							<p class="desc">{{$festival->location}}</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
        Artistas:
        <ul>
            @forelse($festival->artists as $artist)
                <li><a href="{{action('FestivalController@Details', $artist->permalink)}}">{{$artist->name}}</a>
                </li>
            @empty
                Ninguno
            @endforelse
        </ul>
<p>
    <input type="button" onclick="location.href='{{action('FestivalController@Delete', $permalink)}}';"
           value="Borrar"/>
    <input type="button" onclick="location.href='{{action('FestivalController@Edit', $permalink)}}';"
           value="Editar"/>
</p>
<p>
    <input type="button" onclick="location.href='{{action('FestivalController@All')}}';" value="Festivales"/>
    <input type="button" onclick="location.href='/';" value="Inicio"/>
</p>
<h2>Noticias</h2>
@forelse($festival->posts as $post)
    <strong>{{$post->title}}</strong>
    <p>{{$post->lead}}</p>
    <p>{{$post->body}}</p>
    <hr>
@empty
    <p>No hay noticias de momento</p>
@endforelse
</div>
@endsection

<style type="text/css">
	@media (min-width: 768px) {
 .event-list {
		list-style: none;
		font-family: 'Lato', sans-serif;
     margin: 0;
     padding: 0;
	}
	.event-list > li {
		background-color: rgb(255, 255, 255);
        box-shadow: 0 0 5px rgba(51, 51, 51, 0.7);
        padding: 0;
        margin: 0 0 20px;
	}
	.event-list > li > time {
		display: inline-block;
		width: 100%;
		color: rgb(255, 255, 255);
		background-color: rgb(197, 44, 50);
		padding: 5px;
		text-align: center;
		text-transform: uppercase;
	}
	.event-list > li:nth-child(even) > time {
		background-color: rgb(165, 82, 167);
	}
	.event-list > li > time > span {
		display: none;
	}
	.event-list > li > time > .day {
		display: block;
		font-size: 56pt;
		font-weight: 100;
		line-height: 1;
	}
	.event-list > li time > .month {
		display: block;
		font-size: 24pt;
		font-weight: 900;
		line-height: 1;
	}
	.event-list > li > img {
		width: 100%;
	}
	.event-list > li > .info {
		padding-top: 5px;
		text-align: center;
	}
	.event-list > li > .info > .title {
		font-size: 17pt;
		font-weight: 700;
        margin: 0;
	}
	.event-list > li > .info > .desc {
		font-size: 13pt;
		font-weight: 300;
        margin: 0;
	}
    }
</style>
