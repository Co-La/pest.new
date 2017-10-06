<?php

namespace App\Repositories;

use App\Product;

class ProductsRepository extends SiteRepository {
    
     public function __construct(Product $product)
    {
        $this->model = $product;
    }
    
    
}
