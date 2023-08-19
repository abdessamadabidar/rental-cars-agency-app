<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class CarModelPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à consulter cette page");
    }

    public function edit(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à consulter cette page");
    }

    public function create(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à consulter cette page");
    }

    public function delete(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à consulter cette page");
    }
}
