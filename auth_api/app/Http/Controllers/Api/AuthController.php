<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use App\User;


class AuthController extends Controller
{
    /**
     * 
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ];
   
        $fb = [
            'email.required' => 'O campo é obrigátorio',
            'email.email' => 'O campo deve ser preenchido com um email válido'
        ];
   
        $request->validate($rules, $fb);
        
        $credentials = $request->only(['email', 'password']);      
    
        if (!JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token = JWTAuth::fromUser(auth()->user());
        
        return response()->json(['token' => $token]);
    }

    
}
   