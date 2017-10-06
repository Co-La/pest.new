<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bproduct extends Model
{
    protected $fillable = ['name', 'number', 'price', 'bag_id'];


    public function bag() {
        
        return $this->belongsTo('App\Product');
    }
}
