<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['image', 'title', 'text', 'status'];
    
    public function comments() {
        
        return $this->hasMany('App\Comment');
      
    }

    public function filter() {
        return $this->belongsTo('App\Filter');
    }
}
