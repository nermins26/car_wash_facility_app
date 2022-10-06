<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Fortify\Http\Responses\RegisterResponse as FortifyRegisterResponse;

class RegisterResponse extends FortifyRegisterResponse
{
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function toResponse($request)
    {
        $this->guard->logout();

        // return parent::toResponse($request);

        return $request->wantsJson()
                    ? new JsonResponse('', 201)
                    : redirect(route('login'))->with('new-register', 'You are successfully registered. Login with your credentials.');
    }
}
