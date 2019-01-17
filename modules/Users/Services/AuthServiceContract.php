<?php

namespace Modules\Users\Services;

use App\Core\Services\BasicServiceContract;
use Illuminate\Contracts\Auth\Authenticatable;

interface AuthServiceContract extends BasicServiceContract
{
    /**
     * Login User.
     *
     * @param Authenticatable $user
     * @return mixed
     */
    public function login(Authenticatable $user);

    /**
     * Check is user is guest.
     *
     * @return boolean
     */
    public function guest();
}
