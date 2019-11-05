<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('',[
// 	'as' => '',
// 	'uses' => ''
// ]);


Route::get('', [
	'as' => 'home',
	'uses' => 'SlideController@index'
]);

Route::get('/register', [
	'as' => 'register',
	'uses' => 'PageController@ViewRegister'
]);

Route::get('login', [
	'as' => 'login',
	'uses' => 'PageController@ViewLogin'
]);

Route::get('logout', [
	'as' => 'logout',
	'uses' => 'PageController@LogOut'
]);

Route::post('/CheckRequestRegister', [
	'as' => 'CheckRequestRegister',
	'uses' => 'PageController@CheckRequestRegister'
]);

Route::post('CheckLogin', [
	'as' => 'CheckLogin',
	'uses' => 'PageController@Login'
]);

Route::post('/LoginRequest', [
	'as' => 'LoginRequest',
	'uses' => 'PageController@LoginRequest'
]);

Route::post('/InsertUser', [
	'as' => 'InsertUser',
	'uses' => 'PageController@InsertUser'
]);
	
Route::get('/typeproduct/{id}',[
	'as' => 'typeproduct',
	'uses' => 'TypeProductController@GetTypeProducts'
]);

Route::get('detailproduct/{id}',[
	'as' => 'detailproduct',
	'uses' => 'ProductController@GetDetailProduct'
]);

Route::get('GetAllCart',[
	'as' => 'GetAllCart',
	'uses' => 'PageController@GetAllCart'
]);

Route::get('AddToCart/{id}',[
	'as' => 'addtocart',
	'uses' => 'PageController@AddToCart'
]);

Route::get('DeleteOneProductToCart/{id}',[
	'as' => 'DeleteOneProductToCart',
	'uses' => 'PageController@DeleteOneProductToCart'
]);

Route::get('ShoppingCart',[
	'as' => 'ShoppingCart',
	'uses' => 'PageController@ShoppingCart'
]);

Route::post('CheckOutRequest',[
	'as' => 'CheckOutRequest',
	'uses' => 'PageController@CheckOutRequest'
]);

Route::post('AddCartInDB',[
	'as' => 'AddCartInDB',
	'uses' => 'PageController@AddCartInDB'
]);

Route::get('searchproduct',[
	'as' => 'SearchProduct',
	'uses' => 'PageController@SearchProduct'
]);


// Route::get('',[
// 	'as' => '',
// 	'uses' => ''
// ]);