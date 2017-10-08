<?php
/**
 * Created by PhpStorm.
 * User: Corneliu
 * Date: 08.10.2017
 * Time: 10:19
 */

namespace App\Repositories;

use App\Role;
class RolesRepository extends SiteRepository
{
    public function __construct(Role $role)
    {
        $this->model = $role;
    }


}