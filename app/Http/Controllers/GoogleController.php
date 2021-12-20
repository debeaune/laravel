<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{

    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        $getInfo= Socialite::driver($provider)->user(); 
        $user = $this->createUser($getInfo,$provider); 
        auth()->login($user);
        return redirect('http://localhost:3000/login/google/'.$user->api_token);
    }

    function createUser($getInfo,$provider){
        $user = User::where('provier_id',$getInfo->id)->first();
        if(!$user){
            $user= User::create([
                'name' => $getInfo->name,
                'email' => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'api_token' => Str::random(60)
            ]);
        }
        return $user;
    }
}
