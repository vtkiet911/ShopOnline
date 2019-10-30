<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerViewModel extends Model
{
    //
    protected $table = "customer";

    public function bill(){
    	return $this->hasMany('App\BillViewModel','id_customer','id');
    }
}
