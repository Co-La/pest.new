<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    public function culture() {
        return $this->belongsTo('App\Cultivation');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function method() {
        return $this->belongsTo('App\Utilization');
    }
}
