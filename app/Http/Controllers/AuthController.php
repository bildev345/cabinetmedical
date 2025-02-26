<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthControllerRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthControllerRequest $req)
    {
        if(Auth::attempt(['email'=> $req->email,'password'=>$req->password])){
            $req->session()->regenerate();
            // changer la route home par votre route cible
            return redirect()->route('home')->with('success' , 'vous etes authentifié avec succés');
        }
        return redirect()->back()->withErrors([
            'password' => 'Mot de passe incorrect.',
        ]);
    }
    public function logout(){
        Auth::logout();
        // changer la route home par votre route cible
        return redirect()->route('login')->with('success', 'vous avez déconnecté avec succés');
    }
}
