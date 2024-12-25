<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ContactModel;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        
        $validateUser = Validator::make($request->all(),
            [
                'email' => 'required',
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

        if(!Auth::guard('web')->attempt($request->only(['email','password']))){
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Email & Password does not match'
                ],401
            );
        }

        $user = User::where('email', $request->email)->first();
        session()->regenerate();

        return response()->json([
            'status' => true,
            'message' => 'User Logged in successfully',
            'data' => $user
        ],200);
    }

    public function contact_login(Request $request){
        
        $validateUser = Validator::make($request->all(),
            [
                'email' => 'required',
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

            $contact = DB::table('contact')->where('email', $request->email)->first();
            $credentials = $request->only('email', 'password');
            if ($contact && $contact->password === $request->password) {
                return response()->json(['message' => 'Authentication successful', 'data'=>$contact], 200);
            }
        
            // If email or password is incorrect, return a 401 response
            return response()->json(['message' => 'Invalid credentials'], 401);

        return response()->json([
            'status' => false,
            'message' => 'Failed to Login',
            'data' => $request->all()
        ],400);
    }
}
