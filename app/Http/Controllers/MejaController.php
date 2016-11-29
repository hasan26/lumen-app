<?php

namespace App\Http\Controllers;
 
use App\Meja;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MejaController extends Controller{

	public function index(){
 
        $meja  = Meja::all();
        return response()->json($meja);
    }

}