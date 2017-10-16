<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
