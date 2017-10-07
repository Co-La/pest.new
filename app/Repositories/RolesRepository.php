<?php
/**
 * Created by PhpStorm.
 * User: Corneliu
 * Date: 06.10.2017
 * Time: 19:12
 */

namespace App\Repositories;

use App\Role;

class RolesRepository extends SiteRepository
{
    public function  __construct(Role $role)
    {
        $this->model = $role;
    }


}