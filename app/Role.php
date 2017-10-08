<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function permissions() {
        
        return $this->belongsToMany('App\Permision', 'roles_permisions');

    }
    
    public function users() {
        
        return $this->belongsToMany('App\User', 'user_role');        
        
    }

    public function hasPermission($perm)
    {
        foreach($this->permissions as $permission) {
            if(str_is($perm, $permission->name)) {
                return true;
            }
        }
    }

    public function savePermission($perm)
    {
        if(!empty($perm)) {
            $this->permissions()->sync($perm);
        } else {
            $this->permissions()->detach();
        }

        return true;
    }


}
