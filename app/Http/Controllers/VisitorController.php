<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class VisitorController extends Controller
{
    //
    public function signup(Request $request){
        $validateUser = Validator::make($request->all(),
        [
            'lname' => 'required',
            'fname' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]
     );

     if($validateUser->fails()){
        return response()->json([
            'status' =>false,
            'message' => 'Validation Erros',
                'errors' => $validateUser->errors()
        ],401);
        }


        try{
            User::create([
                'lname' => $request->lname,
                'fname' => $request->fname,
                'email' => $request->email,
                'username' => $request->username, // Corrected line
                'password' => $request->password,
                'position_id' => 5
            ]);
        }catch(\Exception $e){
            return response()->json([
                'error' => 'Duplicate entry detected.',
                'message' => 'The provided username or email is already in use.'
            ], 400);
        }
  


    return response()->json([
        'status' => true,
        'message' => 'User Sign up successfully',
     
    ],200);
    
    }
}
