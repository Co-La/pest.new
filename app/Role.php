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

    public function hasPermission($input)
    {

        if ($input) {
            foreach ($this->permisions as $perm) {
                if (str_is($input, $perm->name)) {

                    return TRUE;
                }

            }
        }
    }

    public function savePermission($input) {

        if(!empty($input)) {
            $this->permisions()->sync($input);
        } else {

            $this->permisions()->detach($input);
        }
    }

}
