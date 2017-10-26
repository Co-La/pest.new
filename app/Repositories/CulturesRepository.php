<?php
/**
 * Created by PhpStorm.
 * User: Corneliu
 * Date: 09.10.2017
 * Time: 8:38
 */

namespace App\Repositories;

use App\Cultivation;

class CulturesRepository extends SiteRepository
{

    public function __construct(Cultivation $culture) {
        $this->model = $culture;
    }



}