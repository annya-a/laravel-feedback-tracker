<?php

namespace App\Domain\Users\Services;

use App\Core\Services\BasicService;
use App\Domain\Users\Models\User;

class UserService extends BasicService implements UserServiceContract
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    protected function model()
    {
        return User::class;
    }

    /**
     * Get random user.
     *
     * @return mixed
     */
    public function getRandomUser()
    {
        return $this->builder->inRandomOrder()->first();
    }
}
