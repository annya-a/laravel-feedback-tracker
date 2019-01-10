<?php

namespace App\Http\Middleware\Auth;

use App\Domain\Users\Services\AuthServiceContract;
use App\Domain\Users\Services\UserServiceContract;
use Closure;

class AutoLogin
{
    /**
     * User Service.
     *
     * @var UserServiceContract
     */
    protected $user_service;

    /**
     * Auth service.
     *
     * @var AuthServiceContract
     */
    protected $auth_service;

    /**
     * AutoLogin constructor.
     * @param UserServiceContract $userService
     * @param AuthServiceContract $authService
     */
    public function __construct(UserServiceContract $userService, AuthServiceContract $authService)
    {
        $this->user_service = $userService;
        $this->auth_service = $authService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // If user is a guest we log in him as random user.
        if ($this->auth_service->guest() && $user = $this->user_service->getRandomUser()) {
            $this->auth_service->login($user);
        }

        return $next($request);
    }
}
