<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Awiten Fests</title>
    <link href="{{asset(css/bootstrap.min.css)}}" rel="stylesheet">
    <script src="{{asset(js/jquery.js)}}"></script>	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.1.min.js"></script>	
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{asset(js/bootstrap.min.js)}}"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>  
	<script src="js/wow.min.js"></script>
	<script src="js/functions.js"></script>
</head>

<body>
<div id="breadcrumb">
		<div class="container">	
			<div class="breadcrumb">							
				<li><a href="index.html">Home</a></li>
				<li>Portfolio</li>			
			</div>		
		</div>	
	</div>
<section id="portfolio">
<div class="container">
            <div class="center">
               <p><h1>Festivales:</h1></p>
            </div>

            <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">All Works</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".1">Creative</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".2">Photography</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".wordpress">Web Development</a></li>
            </ul><!--/#portfolio-filter-->
		</div>
<div class="portfolio-items">
    <ul>
        @forelse($festivals as $festival)
                    <div class="portfolio-item wordpress html {{$festival->id}} col-xs-12 col-sm-4 col-md-3">
                            <div class="recent-work-wrap">
                                <img class="img-responsive" src="{{$festival->pathLogo}}" alt="150" width="150">
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <h3><a href="#"><li><a href="/festival/{{$festival->permalink}}">{{$festival->name}}</a></li></a></h3>
                                        <p>Algo de {{$festival->date}} con el genero </p>
                                        <a class="preview" href="{{$festival->pathLogo}}" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                    </div> 
                                </div>
                            </div>
                        </div><!--/.portfolio-item-->
        @empty
            <h2>No hay festivales en la BD</h2>
        @endforelse
    </ul>
</div>
<a href="/">Inicio</a>
</section>
</body>
</html>