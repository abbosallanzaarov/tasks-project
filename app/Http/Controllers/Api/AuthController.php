<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try{

        $validateUser = Validator::make($request->all() , [
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required',
            'role'     => 'required|numeric',
            'job'      => 'nullable|string',
            'age'      => 'nullable|numeric',
        ]);
        // validate error
        if($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message'=> 'validator error',
                'error' => $validateUser->errors()
            ] , 401);
        }
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'job'      => $request->job,
            'age'      => $request->age
        ]);
        return response()->json([
            'status'  => true,
            'message' => 'add user successfully',
            'token'   => $user->createToken('API TOKEN')->plainTextToken
        ], 200);
        }catch(\Throwable $th){
            return response()->json([
                'status' => false,
                'message'=> $th->getMessage(),
            ] , 500);
        }
    }

    // login User
    public function login(Request $request)
    {
        try{
            $validateUser = Validator::make($request->all() ,[
                'email'=> 'required|email',
                'password'=> 'required',
            ]);
            if($validateUser->fails()){
                return response()->json([
                    'status'=> false,
                    'msg'=> 'validator error',
                    'error'=> $validateUser->errors()
                ]);
            }
            if(!Auth::attempt($request->only(['email' , 'password']))){
                return response()->json([
                    'status'=> false,
                    'msg'=> 'email & password   does not match with our record',
                ], 400);
            }
            $user = User::where('email' , $request->email)->first();
            if($user){
                return response()->json([
                    'status'=> true,
                    'msg'=> 'login in successfully',
                    'token'=> $user->createToken("API TOKEN")->plainTextToken
                ]);
            }
        }catch(\Throwable $th){
            return response()->json([
                'status'=> false,
                'error'=> $th->getMessage()
            ]);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status'=> true,
            'msg'=> 'logged out',
        ]);
    }
}
