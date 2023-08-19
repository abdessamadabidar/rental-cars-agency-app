<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MessagePolicy
{
    /**
     * Create a new policy instance.
     */

    public function viewAny(User $user) {
        if ($user->isAdmin()) return true;
        return Response::deny("Vous n'êtes pas autorisé à accéder cette page");
    }

    public function create(User $user) {
        if ($user->isClient()) return true;
        return Response::deny("Vous n'êtes pas autorisé à envoyer un message");
    }


    public function view(User $user, Message $message){
        if ($message->user_id === $user->id || $user->isAdmin()) {
            return true;
        }
        return Response::deny("Vous n'êtes pas autorisé à accéder cette page");
    }

}
