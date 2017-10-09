<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilization extends Model
{
    protected $fillable = ['utilization'];

    public function doses() {
        return $this->hasMany('App\Registers');
    }
}
