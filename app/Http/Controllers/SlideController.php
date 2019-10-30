<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\SlideViewModel;
use App\ProductViewModel;

class SlideController extends Controller
{
    //
	public function index()
	{
		#region properties
		$slides = SlideViewModel::all();
		$newProducts = ProductViewModel::where('new',1)->paginate(8);
		$promotionProducts = ProductViewModel::where('promotion_price','<>',0)->paginate(8,['*'],'pag');
		#endregion
		#region function

		#endregion
		return view('home.index',compact('slides','newProducts','promotionProducts'));
	}
}
