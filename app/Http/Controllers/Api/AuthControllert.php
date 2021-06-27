<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Validator;
use App\Models\User;
use Auth;



class AuthControllert extends Controller
{
    //
    public function singup(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:6|confirmed'
        ]);


        if($validator->fails())
            return response(['errors'=>$validator->errors()->all()],422);
        
        
        $user = User::create([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'password'=>Hash::make($request->password)
                            ]);
            
        return response()->json(['message'=>'Successfully created user!']);                 
                            
                            
    }
    
    
}