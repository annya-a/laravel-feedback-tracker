<?php

namespace Modules\Users\Services;

use App\Core\Services\BasicService;
use Modules\Users\Entities\User;

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
