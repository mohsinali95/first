<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function manufacture(){
        return $this->belongsTo('App\Manufacture','manufacture_id');
    }

    public function order(){
        return $this->belongsToMany('App\Order','ordered_products');
    }

    public function shop(){
        return $this->belongsToMany('App\Shop','shop_manufacture_details','product_id','order_id','id','id');
    }
}
