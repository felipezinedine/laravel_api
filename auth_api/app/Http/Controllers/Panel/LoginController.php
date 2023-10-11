<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {     
        return view('panel.login');
    }

    public function auth(Request $request)
    { 
        $response = Http::asForm()->post('http://127.0.0.1:8000/api/auth/login', [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'role' => 'Privacy Consultant',
        ]);

        //return response()->json(['response' => $response]);
    }
}