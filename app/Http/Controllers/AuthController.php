<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $req){
    	$credentials = [
    		'email' => $req->email,
    		'password' => $req->password
    	];

    	if(Auth::attempt($credentials)){
    		$user = Auth::user();
    		$token = $user->createToken('passport')->accessToken;

    		return response()->json([
    			'token' => $token,
    			'user' => $user
    		],200);
    	}else{
    		return response()->json([
    			'error' => "email ou mot passe incorrect"
    		],401);
    	}
    }


    public function register(Request $req){
    	$this->validate($req,[
    		'name' => 'required|min:3|max:50',
    		'prenom' => 'required|min:3|max:50',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|min:6|max:50',
    		'pseudo' => 'required|min:2|max:15|unique:users'
    	]);

    	$user = User::firstOrCreate([
    		'name' => $req->name,
    		'prenom' => $req->prenom,
    		'email' => $req->email,
    		'password' => bcrypt($req->password),
    		'pseudo' => $req->pseudo
    	]);

    	$token = $user->createToken('passport')->accessToken;

    	return response()->json([
    			'token' => $token,
    			'user' => $user
    		],200);
    }


    public function logout(){
    	Auth::logout();
    	return;
    }
}
