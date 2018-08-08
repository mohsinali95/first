<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Product;
use App\Order;

class OrderController extends Controller
{
    public function showProducts($shopid = ''){

        $shop=Shop::where('id',$shopid)->with('product.manufacture')->first();
        return view('viewOrders',array('shop' => $shop, 'sno' => 0));
    }

    public function insertOrder(Request $request){
        $products = $request->input('products');
        $price = $request->input('total_price');

        $order = new Order();
        $order->total_price = $price;
        $order->user_id = 2;
        $order->created_by = 2;
        $order->updated_by = 2;
        $order->save();
        $orderid = $order->id;

        $orders = Order::find($orderid);
        $orders->product()->attach($products,[
            'created_by'=>2 ,
            'updated_by'=>2 ,
            ]);
        return "Order inserted";
    }
}
