<?php

namespace App\Repositories;

use App\Menu;

class MenusRepository extends SiteRepository {
    
    public function __construct(Menu $menu) {
        $this->model = $menu;
    }
}
