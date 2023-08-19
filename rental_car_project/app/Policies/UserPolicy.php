<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */


   public function view(User $auth, User $user) {
       if ($auth->id === $user->id){
           return true;
       }
       return Response::deny("Vous n'êtes pas autorisé à accéder cette page");
   }

    public function edit(User $auth, User $user) {
        if ($auth->id === $user->id){
            return true;
        }
        return Response::deny("Vous n'êtes pas autorisé à accéder cette page");
    }

    public function viewMessages(User $auth, User $user) {
        if ($auth->id === $user->id){
            return true;
        }
        return Response::deny("Vous n'êtes pas autorisé à accéder cette page");
    }

    public function viewNotifications(User $auth, User $user) {
        if ($auth->id === $user->id){
            return true;
        }
        return Response::deny("Vous n'êtes pas autorisé à accéder cette page");
    }


}
