<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Mail\PasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PasswordController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view( 'password.edit', compact('user'));
    }

    public function update(PasswordRequest $passwordRequest, int $id) {
        $user = User::findOrFail($id);
        if(Hash::check($passwordRequest->input('current_password') , $user->password)) {
            $user->fill(['password' => $passwordRequest->input('new_password')])->save();
            Session::flush();
            Auth::logout();
            return to_route('login')->with('success', 'votre mot de passe a été modifié avec succès');
        }
        return back()->withErrors(['error' => 'Mot de passe incorrect']);
    }

    public function confirm(Request $request) {
        $user = User::where('email', $request->email)->first();
        if ($user !== null) {
            Mail::to($user->email)->send(new PasswordMail($user));
        }
    }

    public function change(User $user) {
        return view('password.reset', compact('user'));
    }

    public function decrypt(Request $request) {
        [$id , $created_at] = explode('///', base64_decode($request->hash));
        $user = User::findOrFail($id);

        if ($user->created_at->toDateTimeString() !== $created_at) {
            abort(403);
        }

        return redirect()->route('password.change',compact('user'));
    }

    public function reset(PasswordRequest $passwordRequest, User $user) {
        $user->fill(['password' => $passwordRequest->input('new_password'), 'updated_at' => time()])->save();
        return to_route('login')->with('success', 'votre mot de passe a été modifié avec succès');
    }


}
