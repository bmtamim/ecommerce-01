<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    /**
     * @var StatefulGuard
     */
    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }
    /**
     * @param UserRegisterRequest $request
     * @return RedirectResponse
     */
    public function create(UserRegisterRequest $request)
    {
        $validate = $request->validated();

        $user = User::create([
            'name'     => $validate['name'],
            'email'    => $validate['email'],
            'phone'    => $validate['phone'],
            'password' => Hash::make($validate['password']),
        ]);

        Auth::guard('web')->loginUsingId($user->id,true);

        return back();
    }
}
