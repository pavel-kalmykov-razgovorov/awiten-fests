<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

/*
 @if (count($festival->photos) != 0)
                <div class="item active">
                    <img src="{{$festival->photos->get(0)}}" alt="Chania">
                </div>
            @endif
            @for ($i = 1; $i < ($festival->photos); $i++)
                <div class="item">
                    <img src="{{$festival->photos->get($i)}}" alt="Chania">
                </div>
$festival = App\Festival::where('id',1)->get();
                 
            @endfor*/

           
