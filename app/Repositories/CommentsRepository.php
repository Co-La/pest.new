<?php

namespace App\Repositories;

use App\Comment;

class CommentsRepository {
    public function __construct(Comment $comment) {        
        $this->model = $comment;
    }
}
