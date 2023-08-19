<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class ClientPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à accéder cette page");
    }

    public function view(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à accéder cette page");
    }

    public function delete(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à accéder cette page");
    }

    public function edit(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à accéder cette page");
    }

    public function viewReservations(User $auth, Client $client) {
        if ($auth->id === $client->id){
            return true;
        }
        return Response::deny("Vous n'êtes pas autorisé à accéder cette page");
    }


}
