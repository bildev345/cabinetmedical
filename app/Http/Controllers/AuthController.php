<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        if(Auth::attempt(['email'=> $req->email,'password'=>$req->password])){
            $req->session()->regenerate();
            return response()->json(['message'=>'Connexion réussie'],200);
        }

        return response()->json(['message'=>'mot de passe or email est incorrecte'],401);
    }
    public function logout(){
        Auth::logout();
        return response()->json(['message' => 'vous etes déconnecté avec success'], 200);
    }




}
