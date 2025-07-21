<?php

namespace App\Repositories\Likes;

use App\Contracts\Repositories\LikeRepositoryInterface;
use App\Models\Like;
use App\Repositories\Eloquent\EloquentRepository;

class LikeRepository extends EloquentRepository implements LikeRepositoryInterface
{
    /**
     * Implement abstract method and base model
     *
     * @return mixed | model
     */
    public function getModel()
    {
        return Like::class;
    }

    // Deploy special methods.
}