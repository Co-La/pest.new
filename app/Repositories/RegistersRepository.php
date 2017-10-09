<?php
/**
 * Created by PhpStorm.
 * User: Corneliu
 * Date: 09.10.2017
 * Time: 16:22
 */

namespace App\Repositories;
use App\Repositories\SiteRepository;
use App\Register;

class RegistersRepository extends SiteRepository
{
    public function __construct(Register $register)
    {
        $this->model = $register;
    }
}