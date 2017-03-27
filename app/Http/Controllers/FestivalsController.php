<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FestivalsController extends Controller
{
	private $festivals;
	private $genres;
	
	public function init(){
		// 		$ms = Person::where('name', '=', 'Foo Bar')->first();
		// 		$persons = Person::order_by('list_order', 'ASC')->get();
		// 		return $view->with('data', ['ms' => $ms, 'persons' => $persons]));
		$festivals = \App\Festival::paginate(6);
		$genres = \App\Genre::get(['genre']);
		//r		eturn view('festivals', ['festivals' => \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id'])]);
		return view('festival.all')
		   ->with('festivals',$festivals)
		   ->with('genres',$genres);
		// 		return view('festival.all', ['festivals' => \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id'])]);
	}
	
	public function filtrado(){
		
	}
	
	public function cambio(){
		$festivals = \App\Festival::paginate(2);
		$genres = \App\Genre::get(['genre']);
		return view('festival.all')
		   ->with('festivals',$festivals)
		   ->with('genres',$genres);
	}
	
}
