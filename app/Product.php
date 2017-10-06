<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['registered','code', 'level', 'name', 'substance', 'company_id', 'category_id','used', 'price', 'pack', 'curr', 'image'];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
    public function company() 
    {
        return $this->belongsTo('App\Company');
    }
}
