

@extends('welcome')
	
	@section('menu')

	<div class="row container">
		<h1>Festivales:</h1>
	</div>
	<section id="portfolio">	
	<div class="row">
        <div class="container">
            <div class="center col-md-2">    
				<ul class="portfolio-filter text-center">
					<li><a class="btn btn-default active" href="#" data-filter="*">All Genres</a></li>
					@forelse($genres as $genre)
					<li><a class="btn btn-default" href="#" data-filter=".3">{{$genre->genre}}</a></li>
					@empty
            		<h2>No hay géneros en la BD</h2>
					@endforelse
					<li><a class="btn btn-default" href="#" data-filter=".festival-2">Other</a></li>
				</ul><!--/#portfolio-filter-->
			</div>
            <div class="col-md-10">
                <div class="portfolio-items">
                @forelse($festivals as $festival)
                    <div class="portfolio-item festival-{{$festival->id}} col-md-3">
                        <div class="recent-work-wrap">
						<a class="preview" href="{{$festival->pathLogo}}" rel="prettyPhoto">
                            <img class="img-responsive" src="{{$festival->pathLogo}}" alt="400" width="400"></a>
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#"><li><a href="/festival/{{$festival->permalink}}">{{$festival->name}}</a></li></a></h3>
									<p>Algo de {{$festival->date}} con el genero </p>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->
				@empty
				<h2>No hay festivales en la BD</h2>
				@endforelse
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
@endsection