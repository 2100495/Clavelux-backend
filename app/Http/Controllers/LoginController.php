<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        
        $validateUser = Validator::make($request->all(),
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );

        if($validateUser->fails()){
            return response()->json([
                'status' =>false,
                'message' => 'Validation Erros',
                'errors' => $validateUser->errors()
        ],401);
        }

        if(!Auth::guard('web')->attempt($request->only(['username','password']))){
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Email & Password does not match'
                ],401
            );
        }

        $user = User::where('username', $request->username)->first();
        session()->regenerate();

        return response()->json([
            'status' => true,
            'message' => 'User Logged in successfully',
            'data' => $user
        ],200);
    }
}
