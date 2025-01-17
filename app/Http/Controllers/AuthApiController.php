<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    //Authentication and Authorization
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' =>'required|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);
        $user = User::create($validatedData);
        $accessToken = $user->createToken('authToken')->accessToken;// To store database 
        
        return response(['user'=>$user,'access_token'=>$accessToken]);


    }
    public function login(Request $request){
        $loginData = $request->validate([    
            'email' => 'email|required',
            'password' =>'required'
        ]);
        if(!auth()->attempt($loginData)){
            return response(['message'=>'Invalid credentials']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=>auth()->user(), 'access_Token'=>$accessToken]);

    }
    public function profile(){
        $user = Auth::user();
        return response(['User Information' =>$user]);
    }
    public function logout(){
        auth()->user()->token()->revoke();
        return response(['status' =>204,'message' =>"Successfully Logout"]);
    }
}
