<?php

namespace App\Http\Controllers\API;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;;
use JWTAuth;

class AuthController extends Controller
{
   

  
    // try {
    //     if(!$token = JWTAuth::attempt($req->only('email', 'password'))){
    //         return response()->json([
    //             'code' => 400,
    //             'error' => 'Email atau password anda salah'
    //         ], 400);
    //     }
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'error' => 'Kesalahan tidak bisa membuat token'
    //             ], 500);
    //     }
    //     return response()->json([
    //         'success' => 'Login berhasil', 
    //         'code' => 200,
    //         'token' => $token
    //     ]);

    public function login()
    {
        $credentials = request(['email', 'password']);

        if(!$token = JWTAuth::attempt($credentials)){
            return response()->json(['error' => 'unautorize'], 404);
        }
        return $this->responseWithToken($token);
    }

    public function register()
    {
        $error = Validator::make(request()->all(),[
            'name' => 'required|min:1',
            'email' => 'required|unique:user',
            'password' => 'required|confirmed',
        ]);

        if($error->fails()){
            return response()->json(['error' => $error->errors()->all()]);
        }else{
            $user = User::create([
                'name' => request()->name,
                'email' => request()->email,
                'password' => bcrypt(request()->password),
            ]);
            $token = JWTAuth::fromUser($user);
            return response()->json(['success' => ['user' => $user, 'token' => $token]]);
        }
    }

    protected function responseWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['sucess' => 'logged out successfullly']);
    }

}
