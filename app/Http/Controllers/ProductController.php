<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\ProductViewModel;

class ProductController extends Controller
{
    //
    public function GetDetailProduct($id){
    	#region properties
    	$product = ProductViewModel::where('id',$id)->get();
    	$product = $product[0];
    	$otherProducts = ProductViewModel::where('id_type',$product->id_type)->where('id','<>',$id)->paginate(3);
    	#endregion
    	return view('Page.detailproduct',compact('product','otherProducts'));
    }
}
