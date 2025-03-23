<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserControllerRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterUserController extends Controller
{
    public function create()
    {
        Auth::logout();
        return view('auth.register');
    }
    public function store(RegisterUserControllerRequest $request)
    {
        $user = User::create($request->all());
        Auth::login($user);
        return redirect()->route('home');
    }
}
