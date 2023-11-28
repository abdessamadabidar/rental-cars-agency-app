<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarModel;
use App\Models\Fuel;
use App\Models\Notification;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (User::getRole() === 'client') {
            $voitures = Car::paginate(6);
            $marques = CarBrand::all();
            $carburants = Fuel::all();
            return view('client.index', compact('user', 'voitures', 'marques', 'carburants'));
        }
        $statistics['totalIncomePerMonth'] = DB::table('reservations')->where('status_id', 2)->whereMonth('created_at', now()->month)->sum('total');
        $statistics['totalIncomePerDay'] = DB::table('reservations')->where('status_id', 2)->whereDay('created_at', now()->day)->sum('total');
        $statistics['numberOfCars'] = Car::count();
        $statistics['numberOfReservations'] = Reservation::count();
        $statistics['numberOfClients'] = User::where('role_id', 2)->count();
        $actualities = Notification::whereDay('created_at', now()->day)->where('user_id', 1)->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.index', compact('user', 'statistics', 'actualities'));
    }


    public function show(User $user)
    {
        Gate::authorize('view', $user);
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        Gate::authorize('edit', $user);
        return view('user.edit', compact('user'));
    }

    public function update(ProfileRequest $profileRequest, User $user)
    {
        $updatedFormFields = $profileRequest->validated();
        if ($profileRequest->hasFile('image'))
        {
            $updatedFormFields['image'] = $profileRequest->file('image')->store('Users', 'public');
        }
        $user->fill($updatedFormFields)->save();
        return to_route('users.show', $user->id)->with('success', 'votre profile a été modifié avec succès');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('home')->with('success', 'votre compte a été supprimé avec succès ');
    }

    public function verify(string $hash) {
        [$id , $created_at] = explode('///', base64_decode($hash));
        $user = User::findOrFail($id);
        if ($user->created_at->toDateTimeString() !== $created_at) {
            abort(403);
        }
        if ($user->email_verified_at !== null) {
            return view('user.email_already_verified', compact('user'));
        }
        $user->fill(['email_verified_at' => time()])->save();
        $notifyAdmin = new Notification(['title' => 'Nouveau compte activé par ' . $user->first_name . ' ' . $user->last_name, 'content' => 'Un nouveau compte a été créé par le client ' . $user->first_name . ' ' . $user->last_name, 'user_id' => 1]);
        $notifyClient = new Notification(['title' => 'Compte AutoRent activé', 'content' => 'Monsieur ' . $user->first_name . ' ' . $user->last_name . ' votre compte AutoRent à bien été activé', 'user_id' => $user->id]);
        $notifyClient->send();
        $notifyAdmin->send();
        return view('user.verified_email', compact('user'));
    }

    public function getMessages(User $user) {
        Gate::authorize('viewMessages', $user);
        $messages =  $user->messages;
        return view('client.messages', compact('user', 'messages'));
    }

    public function getNotifications(User $user) {
        Gate::authorize('viewNotifications', $user);
        $notifications = $user->notifications;
        return view('user.notifications', compact('user', 'notifications'));
    }
}
