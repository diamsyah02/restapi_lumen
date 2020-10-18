<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
// use App\Models\User;

class AuthController extends Controller {
    public function __construct() {
        
    }

    public function register(Request $request) {
        $user = DB::table('users')->insert([
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => app('hash')->make($request->password),
            ]
        ]);

        return response()->json([
            'statusCode'    => 200,
            'message'       => 'Successfully registered',
            'user'          => $user
        ], 200);
    }
    
    public function login(Request $request) {
        $user = DB::table('users')->where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'statusCode'    => 400,
                'message'       => 'login gagal, email yang anda masukkan salah !',
            ], 400);
        }
        if (Hash::check($request->password, $user->password)) {
            $token = app('auth')->attempt($request->only('email', 'password'));
            return response()->json([
                'statusCode'    => 200,
                'message'       => 'login berhasil',
                'token_type'    => 'bearer',
                'expires_in'    => app('auth')->factory()->getTTL() * 60,
                'access_token'  => $token,
            ], 200);
        } else {
            return response()->json([
                'statusCode'    => 400,
                'message'       => 'login gagal, password yang anda masukkan salah !',
            ], 400);
        }
    }
    
    public function logout() {
        app('auth')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
?>