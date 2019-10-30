<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetailViewModel extends Model
{
    //
    protected $table = "bill_detail";

    public function product(){
    	return $this->belongsTo('App\ProductViewModel','id_product','id');
    }

    public function bill(){
    	return $this->belongsTo('App\BillViewModel','id_bill','id');
    }
}
