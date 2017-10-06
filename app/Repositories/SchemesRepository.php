<?php

namespace App\Repositories;

use App\Scheme;

class SchemesRepository extends SiteRepository {
    
    public function __construct(Scheme $scheme) {
        $this->model = $scheme;
    }
}
