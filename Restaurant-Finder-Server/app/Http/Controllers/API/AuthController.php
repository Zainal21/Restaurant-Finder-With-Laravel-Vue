<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api',['expect' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if(!$token = auth()->attempt($credentials)){
            return response()->json(['error' => 'unautorize'], 401);
        }
        return $this->responseWithToken($token);
    }


}
