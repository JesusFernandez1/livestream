<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class githubController extends Controller
{
    public function redirectGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callbackGithub()
    {
        $githubuser = Socialite::driver('github')->user();

        $user = User::where('email', $githubuser->getEmail())->first();

        if ($user) {
            Auth::login($user);
            return redirect()->route('entrada_web');

        } else {

            $user = User::updateOrcreate(
                [
                    'provider_id' => $githubuser->getId()
                ],
                [
                    'email' => $githubuser->getEmail(),
                    'name' => $githubuser->getName(),
                ]
            );

            Auth::login($user);
            return redirect()->route('entrada_web');
        }
    }
}