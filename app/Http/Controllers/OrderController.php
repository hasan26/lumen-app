<?php

namespace App\Http\Controllers;
 
use App\Order;
use App\DetaiOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller{

	public function index(){
 
        $order  = Order::all();
        return response()->json($order);
    }

    public function newOrder(Request $request){

        return response()->json($request);
    }

}