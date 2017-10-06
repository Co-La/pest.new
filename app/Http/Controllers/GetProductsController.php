<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetProductsController extends Controller
{
    protected $products;


    public function index() {
        
        $this->products = $this->getProducts();  
        
        return view(env('THEM').'.site.getproducts')->with('products', $this->products);
    }
    
    
    public function getProducts() {
        
        return \DB::table('newproducts')->get();
        
    }
}
