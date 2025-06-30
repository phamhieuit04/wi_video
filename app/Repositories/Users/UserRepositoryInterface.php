<?php

namespace App\Repositories\Users;

use App\Models\User;

interface UserRepositoryInterface
{
    public function findByEmail($email);
}