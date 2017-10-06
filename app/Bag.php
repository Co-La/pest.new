<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    protected $fillable = ['order_id', 'name', 'adress', 'product', 'price', 'message'];
    
    public function bproducts() {        
        return $this->hasMany('App\Product');
    }
}
