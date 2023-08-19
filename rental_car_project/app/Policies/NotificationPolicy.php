<?php

namespace App\Policies;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NotificationPolicy
{
    /**
     * Create a new policy instance.
     */

    public function viewAny(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à consulter cette page");
    }

    public function view(User $user, Notification $notification) {
        if ($notification->user_id === $user->id || $user->isAdmin()) {
            return true;
        }
        return Response::deny("Vous n'êtes pas autorisé à consulter cette page");
    }

    public function edit(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à accéder à cette page");
    }

    public function create(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à consulter cette page");
    }

    public function delete(User $user)  {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à accéder à cette page");
    }
}
