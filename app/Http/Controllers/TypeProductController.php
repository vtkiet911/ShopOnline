<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\ProductViewModel;
use App\TypeProductViewModel;

class TypeProductController extends Controller
{
    //
    public function GetTypeProducts($id){
    	#region properties
    	$typeProducts = TypeProductViewModel::all();
    	$products = ProductViewModel::where('id_type',$id)->paginate(9);
		$otherProducts = ProductViewModel::where('id_type','<>',$id)->paginate(9,['*'],'pag');
    	#endregion
    	return view('Page.typeproduct',compact('typeProducts','products','otherProducts'));
    }
}
