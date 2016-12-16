<?php

namespace App\Http\Controllers;
 
use App\Meja;

class MejaController extends Controller{

	public function index(){
 
        $meja  = Meja::all();
        return response()->json($meja);
    }

}