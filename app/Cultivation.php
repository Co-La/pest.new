<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cultivation extends Model
{
    protected $fillable = ['id', 'name'];

    public function doses() {
        return $this->hasMany('App\Registers');
    }
}
