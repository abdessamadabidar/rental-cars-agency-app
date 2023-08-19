<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\UserMail;
use App\Models\Notification;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


class RegisterController extends Controller
{

    public function __construct() {
        $this->middleware('guest');
    }

    public function index()
    {
        return view("register");
    }

    public function create(RegisterRequest $registerRequest)
    {
        $validatedFormFields = $registerRequest->validated();
        $validatedFormFields['role_id'] = DB::table('roles')->where('role', 'client')->value('id');
        $validatedFormFields['password'] = Hash::make($validatedFormFields['password']);
        // remember token
        $user = User::create($validatedFormFields);
        $notifyAdmin = new Notification(['title' => 'Nouveau compte AutoRent créé', 'content' => 'Un nouveau compte a été créé par un client.' , 'user_id' => 1,]);
        $notifyClient = new Notification(['title' => 'Bienvenue chez AutoRent', 'content' => 'Félicitation, votre compte AutoRent a été créé avec succès.', 'user_id' => $user->id]);
        $notifyClient->send();
        $notifyAdmin->send();
        // Mailing
        Mail::to($user->email)->send(new UserMail($user));
        return redirect()->route('home')->with('success', 'votre compte a été créé avec succès');
    }
}
