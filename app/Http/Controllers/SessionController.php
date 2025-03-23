<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionControllerRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        if(Auth::check()){
            return redirect()->route('home');
        }
        return view('auth.login');
    }
    public function store(SessionControllerRequest $request)
    {
        if(!Auth::attempt(["email" => $request->email, "password" => $request->password])){
            throw ValidationException::withMessages([
                'email' => 'l\'email et le mot de passe ne sont pas identiques'
            ]);
        };
        $request->session()->regenerate();
        return redirect()->route('home');
    }
    public function destroy()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
