<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function user(){
        return $this->hasOne('App\User','owner_id');
    }

    public function manufactre(){
        return $this->belongsToMany('App\Manufacture','shop_manufacture_details');
    }

    public function product(){
        return $this->belongsToMany('App\Product','shop_product_details','shop_id','product_id','id','id');
    }
}
