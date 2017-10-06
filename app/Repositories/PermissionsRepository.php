<?php
/**
 * Created by PhpStorm.
 * User: Corneliu
 * Date: 06.10.2017
 * Time: 19:29
 */

namespace App\Repositories;

use App\Permision;

class PermissionsRepository
{
    public function  __construct(Permision $permision) {

        $this->model = $permision;
    }
}