<?php

namespace App\Domain\Users\Services;

use App\Core\Services\BasicService;
use App\Domain\Users\Models\User;
use Illuminate\Container\Container as App;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\AuthManager;

class AuthService extends BasicService implements AuthServiceContract
{
    /**
     * Auth manager.
     *
     * @var AuthManager
     */
    protected $auth_manager;

    /**
     * AuthService constructor.
     * @param App $app
     * @param AuthManager $authManager
     * @throws \Exception
     */
    public function __construct(App $app, AuthManager $authManager)
    {
        $this->auth_manager = $authManager;
        parent::__construct($app);
    }

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
     * Login User.
     *
     * @param Authenticatable $user
     * @return mixed
     */
    public function login(Authenticatable $user)
    {
        $this->auth_manager->guard()->login($user);
    }

    /**
     * Check is user is guest.
     *
     * @return mixed
     */
    public function guest()
    {
        return $this->auth_manager->guard()->guest();
    }
}
