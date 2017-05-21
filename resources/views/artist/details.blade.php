@extends('welcome')
@section('mainContent')
    <div class="arreglar-margen">
        @if(isset($artist))
            <div>
                <div class="fondo-artista">
                    <div>
                        <div>
                            <picture>
                                <source media="(min-width: 410px)"
                                        srcset="{{ route('artist.image', ['permalink' => $artist->permalink, 'filename' => $artist->pathHeader]) }}">
                                <img style='height: 100%; width: 100%; z-index: -99;' class="profileHeaderBackground">
                            </picture>
                            <div>
                                <img src="{{ route('artist.image', ['permalink' => $artist->permalink, 'filename' => $artist->pathProfile]) }}"
                                     width="182" height="182" align="left">
                                <div><h3 class="fondo-nombre">{{$artist->name}} </h3></div>
                                </br>
                                <div class="hidden-xs"><h3 class="fondo-nombre">{{$artist->country}} </h3></div>
                                </br>
                                <div class="fondo-nombre hidden-xs">
                                    @forelse($artist->genres()->get(['name']) as $genre)
                                        {{$genre->name}}
                                    @empty
                                        Ninguno
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </br>
            <a href="{{$artist->soundcloud}}">
                <img src={{ asset('images/logos2/Soundcloud.png') }} alt="soundcloud" width="82" height="82"
                     align="left">
            </a>
            <a href="{{$artist->website}}">
                <img src={{ asset('images/logos2/Pagina.png') }} alt="web" width="82" height="82" align="right">
            </a>
    </div>
    </br>
    <h3 style="font-family:verdana; text-align:center">PRÓXIMAS ACTUACIONES </h3>
   
        <div class="row">
                <div class="col-md-10">
            @forelse($artist->festivals as $festival)
                @if ($festival->pivot->confirmed != "0")
                        <div class="portfolio-item festival col-md-4 col-sm-6">
                            <div class="recent-work-wrap">
                                @if ($festival->pivot->confirmed == "1")
                                    <img class="imagen-artista"
                                         src="{{ route('festival.image', ['permalink' => $festival->permalink, 'filename' => $festival->pathLogo]) }}">
                                @elseif($festival->pivot->confirmed == null)
                                     <div class="post-thumb1"><img class="lista-festivales" src="{{ asset('images/festivales/pendiente.png') }}"></div>
                                @endif
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <div class="portfolio-caption">
                                            @if ($festival->pivot->confirmed == "1")
                                                <h3>
                                                    <a href="{{action('FestivalController@Details', $festival->permalink)}}">{{$festival->name}}</a>
                                                </h3>
                                            @elseif($festival->pivot->confirmed == null)
                                                <h3>Próximamente</h3>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

            @empty
                Ninguno
            @endforelse
             </div>    
            </div>
        
    </li>

    @else
        <h3>El artista {{str_replace('-', ' ', title_case($permalink))}} no existe. Probablemente haya sido borrado de
            la base de datos</h3>
    @endif
@endsection