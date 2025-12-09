<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Str;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){
        try{
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
            $user = Auth::user();
            $name = $user->name;
            $token = User::where('email',  $request->email)->first()->createToken('api-token')->plainTextToken;
        }

        return response()->json([
            'status' => true,
            'token' => $token,
            'message' => "berhasil login",
            'name' => $name
        ]);
        }catch(\Throwable $e){
             return response()->json([
                'status' => false,
                'message' => "Gagal login",
                'errors' => $e instanceof \Illuminate\Validation\ValidationException 
                    ? $e->errors() 
                    : $e->getMessage(),
            ]);
        }
    }

    public function logout(Request $request){
        try{
            $user = $request->user();
            $user->currentAccessToken()->delete();
            return response()->json([
                'status' => true,
                'Message' => "Logout Success"
            ]);
        }catch(\Throwable $e){
            return response()->json([
                'message' => 'Failed logout',
                'status' => false,
                'errors' => $e instanceof \Illuminate\Validation\ValidationException 
                    ? $e->errors() 
                    : $e->getMessage(),
            ]);
        }
    }
}
