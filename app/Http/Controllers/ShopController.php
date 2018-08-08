<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Product;


class ShopController extends Controller
{
    public function showShops(){
        $shops = Shop::all();
        return view('viewShops',array('shops' => $shops, 'sno' => 1));
    }

}
