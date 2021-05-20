<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Karyawan;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $logindata = $request->all();
        $validate = Validator::make($logindata, [
            'email_karyawan' => 'required',
            'password' => 'required'
        ]);


        if($validate->fails()){
            return response(['message' => $validate->errors()],400);
        }
        if(!Auth::attempt($logindata)){
            return response(['message' => 'Invalid Cresdentials'],401);
        }
        $user = Auth::user();
        $token = $user->createToken('Authentication Token')->accessToken;

        return response([
            'message' => 'Authenticated',
            'user' => $user,
            'token_type' => 'Bearer',
            'access_token' => $token
        ]);
    
        
    }
}
