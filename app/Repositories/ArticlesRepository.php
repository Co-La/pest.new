<?php

namespace App\Repositories;

use App\Repositories\SiteRepository;
use App\Article;

class ArticlesRepository extends SiteRepository {
    
    public function __construct(Article $article) {
        $this->model = $article;
    }
}
