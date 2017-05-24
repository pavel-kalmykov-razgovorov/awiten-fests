@extends('welcome')
@section('mainContent')
<html res="{{ App::setlocale(session('lang'))}}">
    <div class="arreglar-margen">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="bg-primary text-white text-center">
                        <h1>{{$festival->name}}</h1>
                    </div>
                </div>
                <div class="col-md-3 hidden-xs">
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
            <div class="row hidden-xs">
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
                                <img src="{{ route('festival.image', ['permalink' => $festival->permalink, 'filename' => $festival->photos->get(0)->name]) }}">
                            </div>
                        @endif
                        @for ($i = 1; $i < $festival->photos()->count(); $i++)
                            <div class="item">
                                <img src="{{ route('festival.image', ['permalink' => $festival->permalink, 'filename' => $festival->photos->get($i)->name]) }}">
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
            <div class="row hidden-xs">
                <div class="col-md-10">
                    <h2>{{ trans('translate.invitados') }}</h2>
                    @forelse($artistas as $artist)
                        <div class="portfolio-item festival col-md-4 col-sm-6 wow flipInY" data-wow-duration="1000ms"
                             data-wow-delay="500ms">
                            <div class="recent-work-wrap">
                                @if ($artist->pivot->confirmed == "1")
                                    <img class="imagen-artista"
                                         src="{{ route('artist.image', ['permalink' => $artist->permalink, 'filename' => $artist->pathProfile]) }}">
                                @elseif($artist->pivot->confirmed == null)
                                    <img class="imagen-artista" src="{{ asset('images/artistas/pendiente.png') }}">
                                @endif
                                <div class="overlay">
                                    <div class="recent-work-inner">
                                        <div class="portfolio-caption">
                                            @if ($artist->pivot->confirmed == "1")
                                                <h3>
                                                    <a href="{{action('ArtistController@Details', $artist->permalink)}}">{{$artist->name}}</a>
                                                </h3>
                                            @elseif($artist->pivot->confirmed == null)
                                                <h3>{{ trans('translate.proximamente') }}</h3>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul>
                            @empty
                                <div class="alert alert-danger">
                                    <h1>{{ trans('translate.noartistas') }}</h1>
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

            <div class="row visible-xs">
                <h2>{{ trans('translate.invitados') }}</h2>
                @forelse($artistas as $artist)

                    <div><img class="imagen-artista"
                              src="{{ route('artist.image', ['permalink' => $artist->permalink, 'filename' => $artist->pathProfile]) }}"
                              style="width: 100%; height: 100%">
                        <h4><a href="{{action('ArtistController@Details', $artist->permalink)}}">{{$artist->name}}</a>
                        </h4>
                    </div>



                @empty
                    <div class="alert alert-danger">
                        <h1>{{ trans('translate.noartistas') }}</h1>
                    </div>
                @endforelse

            </div>

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h1><strong>{{ trans('translate.noticias') }}</strong></h1>
                    </div>
                    <table class="table table-fixed">
                        <tbody>
                        @forelse($festival->posts as $post)
                            <tr>
                                <td class="text-center">
                                    <h2><strong> {{$post->title}} </strong></h2>
                                    <h3> {{$post->lead}} </h3>
                                    <p>{{ str_limit($post->body, 300) }}
                                        <a class="bg-info"
                                           href='{{action('FestivalController@MostrarNoticia', $post->id)}}'>{{ trans('translate.leermas') }}</a>
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <p>{{ trans('translate.nonoticias') }}</p>
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

        .table-fixed tbody td, .table-fixed thead > tr > th {
            float: left;
            border-bottom-width: 0;
        }
    </style>
@endsection

