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
    <li>
        <ul>
            @forelse($artist->festivals()->get() as $festival)
                <div class="post-container1">

                    <h4><a href="/festival/{{$festival->permalink}}">{{$festival->name}}</a></h4>
                    <div class="post-thumb1">
                        <img class="lista-festivales"
                             src="{{ route('festival.image', ['permalink' => $festival->permalink, 'filename' => $festival->pathLogo]) }}">
                    </div>

                    <div class="post-content1 hidden-xs">
                        <h4 class="post-title1"><a
                                    href="/festival/{{$festival->permalink}}">{{$festival->date->toDateString()}}</a>
                        </h4>
                        <h4 class="post-title1"><a href="/festival/{{$festival->permalink}}">{{$festival->location}}</a>
                        </h4>
                    </div>
                </div>

            @empty
                Ninguno
            @endforelse
        </ul>
    </li>

    @else
        <h3>El artista {{str_replace('-', ' ', title_case($permalink))}} no existe. Probablemente haya sido borrado de
            la
            base de datos</h3>
        @endif

        </div>
@endsection