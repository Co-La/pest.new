<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newproduct;

class GetAjaxProduct extends Controller
{
    public function index(Request $request) {
        
        if($request->isMethod('GET')) {
            
            $products = Newproduct::all();
            
            return response()->json($products);
        }
    }
}
