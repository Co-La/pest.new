<?php
/**
 * Created by PhpStorm.
 * User: Corneliu
 * Date: 09.10.2017
 * Time: 11:52
 */

namespace App\Repositories;
use App\Parasite;

class ParasitesRepository extends SiteRepository
{
    public function __construct(Parasite $parasite)
    {
        $this->model = $parasite;
    }
}