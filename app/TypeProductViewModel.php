<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeProductViewModel extends Model
{
    //
    protected $table = "type_products";

    public function product(){
    	return $this->hasMany('App\ProductViewModel','id_type','id');
    }
}
