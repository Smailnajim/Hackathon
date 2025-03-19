<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|min:5',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
            'date_nisonce' =>  Carbon::parse("15-05-2000") ,
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(['token' => $token, 201]);
    }

    public function loging(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:5',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || $user->password !== $request->password){
            return response()->json(['state' => 'this email or password false'], 404);
        }

        $token = JWTAuth::fromUser($user);
        return response()->json(['token' => $token], 200);
    }

    public function logout(){
        Auth::logout();
        return response(['state' => 'logout By seccessflly']);
    }
}
