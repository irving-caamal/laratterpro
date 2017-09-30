<?php

namespace App\Http\Controllers;

use App\User;
use App\SocialProfile;
use Illuminate\Http\Request;
use Socialite;

class SocialAuthController extends Controller
{
    //
    public function facebookLogin()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback ()
    {
        /**
         * Obtenemos el objeto del usuario con Socialite.
         */
        $facebookUserData  = Socialite::driver('facebook')->user();

        //dd($facebookUserData);
        /**
         * Verifica si existe un usuario con esta cuenta para mandarlo a home o registrarlo como nuevo user.
         */
        $existingFacebookUser = User::whereHas('socialProfiles', function ($query) use ($facebookUserData) {
           $query->where('social_id', $facebookUserData->id);
        })->first();

        if($existingFacebookUser !== null)
        {
            auth()->login($existingFacebookUser);

            return redirect('/');
        }
        //-- Termina validacion de user existente

        /**
         * Respuesta que obtendrá despues de las acciones previas.
         */
        session()->flash('facebookUser',$facebookUserData);

        return view('users.facebook',[
            'user' => $facebookUserData,
        ]);

    }

    public function facebookRegister(Request $request)
    {
        $facebookUserData =session('facebookUser');

        $username = $request->input('username');

        //dd($dataFacebook);
        //dd($username);
        $user = User::create([
            'name' => $facebookUserData->name,
            'email' => $facebookUserData->email,
            'avatar' => $facebookUserData->avatar,
            'username' => $username,
            'password' => str_random(16),
        ]);
        /**
         * Agregamos una relacion en base de datos con el id de la sesion de facebook con nuestro id de usuarios
         */
        $profile = SocialProfile::create([
            'social_id'=> $facebookUserData->id,
            'user_id' => $user->id,
        ]);

        auth()->login($user);

        return redirect('/');
    }

}
