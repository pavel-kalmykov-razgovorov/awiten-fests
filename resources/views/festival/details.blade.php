@extends('welcome')
@section('mainContent')
<div class="arreglar-margen">
	<div class="container">
    	<div class="row">
			<div class="col-md-9">
				<div class="bg-primary text-white text-center">
					<h1>{{$festival->name}}</h1>
				</div>
			</div>
			<div class="col-md-3">
					<ul class="event-list">
						<li>
							<time datetime="{{\Carbon\Carbon::parse($festival->date)->format('d/m/Y')}}">
								<span class="day">{{$festival->date->format('j')}}</span>
								<span class="month">{{$festival->date->format('F')}}</span>
								<span class="year">{{$festival->date->format('Y')}}</span>
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
		<div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					@if ($festival->photos()->count() != 0)
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					@endif
					@for ($i = 1; $i < $festival->photos()->count(); $i++)
						<li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
					@endfor
				</ol>
			<div class="carousel-inner" role="listbox">
					@if ($festival->photos()->count() != 0)
						<div class="item active">
							<img src="{{$festival->photos->get(0)->path}}">
						</div>
					@endif
					@for ($i = 1; $i < $festival->photos()->count(); $i++)
						<div class="item">
							<img src="{{$festival->photos->get($i)->path}}">
						</div>
					@endfor
			</div>
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
	<div class="row">
		<div class="col-md-10">
			<h2>Artistas Invitados</h2>
			@forelse($artistas as $artist)
			<div class="portfolio-item festival col-md-4 col-sm-6 wow flipInY" data-wow-duration="1000ms" data-wow-delay="500ms">
            	<div class="recent-work-wrap">
						<img class = "imagen-artista" src="{{ asset('images/artistas/' . trim($artist->permalink) . '/' . 'profile.jpg') }}">
					<div class="overlay">
                    	<div class="recent-work-inner">
                             <div class="portfolio-caption">
                             	<h3><a href="{{action('ArtistController@Details', $artist->permalink)}}">{{$artist->name}}</a></h3>
                            </div>
                       </div>
                  </div>
                </div>
            </div>
			<ul>
			@empty
				<div class="alert alert-danger">
					<h1>No hay artistas aún.</1>
				</div>
			@endforelse
			</ul>
		</div>
		<div class="col-md-2">
			<div class="pagination pagination-lg">
				{{ $artistas->links() }}
			</div>
    	</div>
	</div>
	<div class="row">
      <div class="panel panel-default">
        <div class="panel-heading text-center">
          <h1><strong> Noticias</strong></h1>
        </div>
        <table class="table table-fixed">
          <tbody>
			  @forelse($festival->posts as $post)
            <tr>
              <td class="text-center">
				<h2><strong> {{$post->title}} </strong></h2>
				<h3> {{$post->lead}} </h3>
    			<p>{{ str_limit($post->body, 300) }}
				<a class="bg-info" href='{{action('FestivalController@MostrarNoticia', $post->id)}}'>Leer más</a>
				</p>
			  </td>
            </tr>
			@empty
    			<p>No hay noticias de momento</p>
			@endforelse
          </tbody>
        </table>
      </div>
  </div>
  </div>
</div>
		  	<div class="text-center">
    			<div class="pagination pagination-lg">
					{!! $festival->posts->render() !!}
				</div>	
			</div>

<style>
	.table-fixed thead {
  width: 97%;
}
.table-fixed tbody {
  height: 400px;
  overflow-y: auto;
  width: 100%;
}
.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
  display: block;
}
.table-fixed tbody td, .table-fixed thead > tr> th {
  float: left;
  border-bottom-width: 0;
}
</style>
@endsection

