<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillViewModel extends Model
{
    //
    protected $table = "bills";

    public function bill_detail(){
    	return $this->hasMany('App\BillDetailViewModel','id_bill','id');
    }

    public function customer(){
    	return $this->belongsTo('App\CustomerViewModel','id_bill','id');
    }
}
