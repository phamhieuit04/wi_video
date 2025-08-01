<?php

namespace App\Repositories\Users;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;
use App\Repositories\Eloquent\EloquentRepository;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * Implement abstract method and base model
     *
     * @return mixed | model
     */
    public function getModel()
    {
        return User::class;
    }

    // Deploy special methods.
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function getInfo($id)
    {
        $user = $this->_model->where('id', $id)
            ->withCount(['followers', 'following', 'videos'])
            ->first();
        return $user;
    }
}