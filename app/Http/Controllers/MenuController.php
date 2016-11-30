<?php

namespace App\Http\Controllers;
 
use App\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller{

	public function index(){
 
        $menu  = Menu::all();
        return response()->json($menu);
    }

    public function food(){
        $menu_food = Menu::where("type","1")->get();;
        return response()->json($menu_food);
    }

    public function drink(){
        $menu_drink = Menu::where("type","2")->get();
        return response()->json($menu_drink);
    }

}