<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Session;
use App\Cart;
use App\ProductViewModel;
use App\Http\Requests\CheckOutRequest;
use Validator;

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
	public function CheckOutRequest(Request $req)
	{
		$rules = [
        	'name' => 'required',
            'email' => 'required|email',
            'adress' => 'required',
            'phone' => 'required|integer|digits:9',
    	];
	    $validator = Validator::make($req->all(),$rules);
	   	if ($validator->passes()) {
			return response()->json(['success'=>'Added new records.']);
        }
    	return response()->json(['error'=>$validator->errors()]);
	}
	// public function CheckOutRequest(CheckOutRequest $req)
	// {
	// 	return response()->json(["problem in data"],422);
	// }
	public function DeleteSession()
	{
		Session::forget('cart');
		return redirect('');
	}
}
