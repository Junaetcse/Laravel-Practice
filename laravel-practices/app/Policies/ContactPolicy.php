<?php

namespace App\Policies;

use App\Contact;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user , Contact $contact){
        return true;
    }

    public function create(User $user){
        return $user->id > 0;
    }

    public function update(User $user, Contact $contact){
        return $user->id == $contact->user_id;
    }

    public function delete(User $user, Contact $contact){
        return $user->id == $contact->user_id;
    }
}
