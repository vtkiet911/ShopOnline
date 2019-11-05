<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Session;
use App\Cart;
use Hash;
use Auth;
use App\ProductViewModel;
use App\CustomerViewModel;
use App\BillViewModel;
use App\BillDetailViewModel;
use App\UserViewModel;
use App\Http\Requests\CheckOutRequest;
use App\Http\Requests\CheckRequestRegister;
use App\Http\Requests\LoginRequest;
use Validator;

class PageController extends Controller
{
    //
    public function ViewRegister()
    {
    	return view('Home.register');
    }

    public function ViewLogin()
    {
    	return view('Home.login');
    }

    public function LoginRequest(Request $req)
    {
    	#region properties
    		$rules = new LoginRequest;
    		$validator = Validator::make($req->all(),$rules->rules());
    	#endregion

    	#region function

    	#endregion
    	return response()->json(['error'=>$validator->errors()]);
    }
    public function Login(Request $req)
    {
    	$credentials = array('email' => $req->email, 'password' => $req->password);
		if(Auth::attempt($credentials)){
			return '1';
		}
		else{
			return '0';
		}
    }

    public function LogOut(){
    	Auth::logout();
    	return redirect('');
    }

    public function CheckRequestRegister(Request $req)
    {
    	#region properties
    		$rules = new CheckRequestRegister;
    		$validator = Validator::make($req->all(),$rules->rules());
    	#endregion

    	#region function

    	#endregion
    	return response()->json(['error'=>$validator->errors()]);
    }
    public function InsertUser(Request $req)
    {
    	#region properties
    		$user = new UserViewModel;

    		$user->full_name = $req->name;
    		$user->email = $req->email;
    		$user->password = Hash::make($req->password);
    		$user->phone = $req->phone;
    		$user->address = $req->adress;
    	#endregion
    	#region function
			$user->save();
    	#endregion
    }
    public function ShoppingCart()
    {
    	#region properties
	    	$oldCart = Session('cart')?Session::get('cart'):null;
			$cart = new Cart($oldCart);
	    	return view('Page.shoppingcart',compact('cart'));
    	#endregion
    }
	public function AddToCart($id)
	{
		#region properties
			$product = ProductViewModel::find($id);
			$oldCart = Session('cart')?Session::get('cart'):null;
			$cart = new Cart($oldCart);
			$cart->add($product, $id);
			Session::put('cart',$cart);
		#endregion

		return redirect()->back();

	}

	public function DeleteOneProductToCart($id)
	{
		#region properties
			$oldCart = Session('cart')?Session::get('cart'):null;
			$cart = new Cart($oldCart);
			$cart->removeItem($id);
			Session::put('cart',$cart);
		#endregion

	    #region function
			if($cart->totalQty == 0){
				Session::flush();
				return redirect('');
			}
		#endregion

		return redirect()->back();
	}
	public function CheckOutRequest(Request $req)
	{
		#region properties
			// lấy những quy định của dữ liệu nhập vào
			$rules = new CheckOutRequest;
			// kiểm tra dữ liệu nhập vào so với quy định.
		    $validator = Validator::make($req->all(),$rules->rules());
	    #endregion

	    #region function
		   	if ($validator->passes()) {
				// Nếu dữ liệu nhập vào không có vấn đề.

	        }
		#endregion
    	return response()->json(['error'=>$validator->errors()]);
	}

	public function AddCartInDB(Request $req)
	{
		#region 
			$cart = Session::get('cart');

			$customer = new CustomerViewModel;
			$customer->name = $req->name;
			$customer->gender = $req->gender;
			$customer->email = $req->email;
			$customer->address = $req->adress;
			$customer->phone_number = $req->phone;
			$customer->note = $req->notes;
			$customer->created_at = date('Y-m-d');
			$customer->save();

			$bill = new BillViewModel;
			$bill->id_customer = $customer->id;
			$bill->date_order = date('Y-m-d');
			$bill->total = $cart->totalPrice;
			$bill->payment = $req->payment;
			$bill->note = $req->notes;
			$bill->save();

			foreach($cart->items as $key => $value){
				$bill_detail = new BillDetailViewModel;
				$bill_detail->id_bill = $bill->id; 
				$bill_detail->id_product = $key; 
				$bill_detail->quantity = $value['qty'];
				$bill_detail->unit_price =  $value['price'];
				$bill_detail->save();
			}
			Session::forget('cart');
		#endregion
		return redirect('');
	}

	public function SearchProduct(Request $req)
	{
		$products = ProductViewModel::where('name','like','%'.$req->key.'%')->paginate(8);

		return view('Page.search',compact('products'));
	}
	public function DeleteSession()
	{
		Session::forget('cart');
		return redirect('');
	}

}
