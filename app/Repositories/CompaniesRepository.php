<?php

namespace App\Repositories;

use App\Repositories\SiteRepository;
use App\Company;

class CompaniesRepository extends SiteRepository {
    
    public function __construct(Company $company) {
        $this->model = $company;
    }
}
