<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permisions() {
        
        return $this->belongsToMany('App\Permision', 'roles_permisions');

    }
    
    public function users() {
        
        return $this->belongsToMany('App\User', 'user_role');        
        
    }


}
