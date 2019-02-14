<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function view()
    {
        $user = Auth::user();
        $contact = Contact::find(1);
        if ($user->can('view', $contact)) {
            echo "Current logged in user is allowed to update the Contact: {$contact->id}";
        } else {
            echo 'Not Authorized.';
        }
    }

    public function create()
    {
        $user = Auth::user();
        if ($user->can('create', Contact::class)) {
            echo 'Current logged in user is allowed to create new Contact.';
        } else {
            echo 'Not Authorized';
        }
        exit;
    }

    public function update()
    {
        $user = Auth::user();
        $contact = Contact::find(1);
        if ($user->can('update', $contact)) {
            echo "Current logged in user is allowed to update the contact: {$contact->id}";
        } else {
            echo 'Not Authorized.';
        }
    }

    public function delete()
    {
        $user = Auth::user();
        $contact = Contact::find(1);

        if ($user->can('delete', $contact)) {
            echo "Current logged in user is allowed to delete the contact: {$contact->id}";
        } else {
            echo 'Not Authorized.';
        }
    }

}
