<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Parasite;

class Register extends Model
{
    protected $fillable = ['dose', 'exit_date', 'last_utilization', 'parasite_id', 'culture_id', 'product_id', 'method_id'];

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
