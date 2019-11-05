<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\TypeProductViewModel;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        view()->composer('Blade.header',function($view){
            $typeProducts = TypeProductViewModel::all();
            $view->with('typeProducts',$typeProducts);
        });
        view()->composer('Blade.header',function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with('cart',$cart);
            }
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
