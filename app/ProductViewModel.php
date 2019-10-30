<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductViewModel extends Model
{
    //
    protected $table = "products";

    public function products_type()
    {
    	return $this->belongsTo('App\TypeProductViewModel','id_type','id');
    }

    public function bill_detail(){
    	return $this->hasMany('App\BillDetailViewModel','id_product','id');
    }
}
