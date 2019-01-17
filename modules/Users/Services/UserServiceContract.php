<?php

namespace Modules\Users\Services;

use App\Core\Services\BasicServiceContract;
use Illuminate\Contracts\Auth\Authenticatable;

interface UserServiceContract extends BasicServiceContract
{
    /**
     * Get random user.
     *
     * @return Authenticatable
     */
    public function getRandomUser();
}
