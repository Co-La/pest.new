<?php
/**
 * Created by PhpStorm.
 * User: Corneliu
 * Date: 06.10.2017
 * Time: 19:29
 */

namespace App\Repositories;

use App\Permision;
use Gate;

class PermissionsRepository extends SiteRepository
{
    protected $rol_rep;
    public function __construct(Permision $permision, RolesRepository $rol_rep)
    {
        $this->model = $permision;
        $this->rol_rep = $rol_rep;
    }

    public function changePermissions($request)
    {
        if(Gate::denies('UPDATE_USERS', function() {
            abort(404);
        }));

        $input = $request->except('_token');

       $roles = $this->rol_rep->get();

        foreach($roles as $role) {
            if(isset($input[$role->id])) {
                $role->savePermission($input[$role->id]);
            } else {
                $role->savePermission([]);
            }
        }

        return ['succes' => 'Modificarile au fost pastrate'];
    }

}
