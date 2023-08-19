<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

use \Illuminate\Support\Str;


class CarPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAll(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à consulter cette page");
    }

    public function create(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à consulter cette page");
    }

    public function edit(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à consulter cette page");
    }

    public function delete(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à consulter cette page");
    }
}
