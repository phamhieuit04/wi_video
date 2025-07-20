<?php

namespace App\Contracts\Repositories;

interface UserRepositoryInterface
{
    public function findByEmail($email);

    public function getInfo($id);
}