<?php

namespace App\Repositories;

use App\Category;

class CategoriesRepository extends SiteRepository {
    
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
}
