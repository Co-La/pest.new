<?php
/**
 * Created by PhpStorm.
 * User: Corneliu
 * Date: 08.10.2017
 * Time: 10:17
 */

namespace App\Repositories;

use App\Permision;
use App\Repositories\RolesRepository;


class PermissionsRepository extends SiteRepository
{

    protected  $rol_rep;

    public function __construct(Permision $permission, RolesRepository $rol_rep)
    {
        $this->model = $permission;
        $this->rol_rep = $rol_rep;
    }

    /**
     * @param $request
     * @return array
     */
    public function changePermissions($request)
    {
        if(\Gate::denies('UPDATE_USERS', function() {
            abort(404);
        }));

        $input = $request->except('_token');
        $roles = $this->rol_rep->get();
       foreach ($roles as $role) {
           if(isset($input[$role->id])) {
               $role->savePermission($input[$role->id]);
           } else {
               $role->savePermission([]);
           }
       }

       return ['status' => 'Tabelul a fost modificat'];

    }
}