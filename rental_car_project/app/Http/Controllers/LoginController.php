<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Mail\UserMail;
use App\Models\Car;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{



    public function index(Request $request)
    {

        if (\url()->previous() === \route('messages.create')) {
            \session(['prev_url' => \url()->previous()]);
        }
        elseif (\url()->previous() === \route('navigate')){
            \session(['prev_url' => \route('reservations.create', $request->car_id)]);
        }
        else {
            \session(['prev_url' => \route('home')]);
        }

        return view("login");
    }

    public function connect(LoginRequest $loginRequest)
    {
        if (Auth::attempt($loginRequest->validated()))
        {
            $user = Auth::user();
            if ($user->hasVerifiedEmail()) {
                $loginRequest->session()->regenerate(true);
                if ($user->isClient()) {
                    return Redirect::to(\session('prev_url'))->with('success', 'vous êtes connecté avec succès');
                }
                return to_route('users.index')->with('success', 'vous êtes connecté avec succès');
            }

            $loginRequest->session()->invalidate();
            Mail::to($user->email)->send(new UserMail($user));
            return back()->withErrors(['warning' => 'Merci de bien vouloir vérifier votre boîte mail pour activer votre compte '])->onlyInput('email');
        }
        return back()->withErrors(['error' => 'Email ou Mot de passe incorrect'])->onlyInput('email');
    }

    public function disconnect()
    {
        Session::flush();
        Auth::logout();
        return to_route('home')->with('success', 'vous avez été déconnecté de votre compte');
    }
}
