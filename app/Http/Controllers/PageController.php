<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Session;
use App\Cart;
use App\ProductViewModel;

class PageController extends Controller
{
    //
    public function ShoppingCart(){
    	#region properties
	    	$oldCart = Session('cart')?Session::get('cart'):null;
			$cart = new Cart($oldCart);
	    	return view('Page.shoppingcart',compact('cart'));
    	#endregion
    }
	public function AddToCart($id){

		#region properties
			$product = ProductViewModel::find($id);
			$oldCart = Session('cart')?Session::get('cart'):null;
			$cart = new Cart($oldCart);
			$cart->add($product, $id);
			Session::put('cart',$cart);
		#endregion

		return redirect()->back();

	}

	public function DeleteOneProductToCart($id){

		#region properties
			$oldCart = Session('cart')?Session::get('cart'):null;
			$cart = new Cart($oldCart);
			$cart->removeItem($id);
			Session::put('cart',$cart);

			if($cart->totalQty == 0){
				Session::flush();
			}
		#endregion

		return redirect()->back();
	}


	public function DeleteSession()
	{
		Session::flush();
		return redirect()->back();
	}
}
