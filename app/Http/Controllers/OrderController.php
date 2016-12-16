<?php

namespace App\Http\Controllers;
 
use App\Order;
use App\DetailOrder;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller{

	public function index(){
 
        $order  = Order::all();

        $data = array();
        for ($i=0;$i < count($order);$i++){
            $idOrder = $order[$i]->id;
            $results = DB::select( DB::raw("SELECT menus.name,detail_orders.qty FROM detail_orders JOIN menus ON detail_orders.id_menu = menus.id WHERE detail_orders.id_order = '$idOrder'") );
            $value = array(
                "orderId"=>$idOrder,
                "meja" => $order[$i]->meja,
                "menu"=>$results
            );
            $data[$i]=$value;
        }
        return response()->json($data);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function newOrder(Request $request){

        $order = new Order;
        $order->meja = $request->meja;
        $order->save();
        foreach ($request->menu as $i => $menu){
            $detail = new  DetailOrder;
            $detail->id_menu = $menu['menu'];
            $detail->qty = $menu['qty'];
            $detail->id_order= $order->id;
            $detail->save();
        }
        return response()->json($order->id);

    }

}