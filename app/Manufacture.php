<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    public function product(){
        return $this->hasMany('App\Product');
    }

    public function shop(){
        return $this->belongsToMany('App\Shop','shop_manufacture_details');
    }
}
