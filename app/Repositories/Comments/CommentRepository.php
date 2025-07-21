<?php

namespace App\Repositories\Comments;

use App\Contracts\Repositories\CommentRepositoryInterface;
use App\Models\Comment;
use App\Repositories\Eloquent\EloquentRepository;

class CommentRepository extends EloquentRepository implements CommentRepositoryInterface
{
    /**
     * Implement abstract method and base model
     *
     * @return mixed | model
     */
    public function getModel()
    {
        return Comment::class;
    }

    // Deploy special methods.
}