<?php
/**
 * Created by PhpStorm.
 * User: Corneliu
 * Date: 09.10.2017
 * Time: 13:31
 */

namespace App\Repositories;
use App\Repositories\SiteRepository;
use App\Utilization;


class MethodsRepository extends SiteRepository
{
    public function __construct(Utilization $utilization) {
        $this->model = $utilization;
    }
}