<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'born', 'company', 'adress', 'alias', 'facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function comments() {        
        return $this->hasMany('App\Comment');
    }
    
    public function roles() {        
        return $this->belongsToMany('App\Role', 'user_role'); 
    }
    
    public function canDo($perm) {        
        if(is_array($perm)) {           
            //
        } else {

            foreach ($this->roles as $role) {
                foreach ($role->permissions as $permision) {
                   if(str_is($perm, $permision->name)) {
                       return TRUE;
                   }
                }
            }
        }
    }

}
