<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function complaint(){
        return $this->hasMany('App\Complaint');
    }

    public function product(){
        return $this->belongsToMany('App\Product','ordered_products','order_id','product_id','id','id');
    }
}
