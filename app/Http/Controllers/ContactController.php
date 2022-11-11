<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showHome ()
    {
        $contacts = Contact::all();

        return view("home", [ "contacts" => $contacts ]);
    }

    public function showNewContact () {
        return view('new_contact');
    }

    public function addContact (Request $request) {
        $name = $request->input("name");
        $phone = $request->input("phone");

        $contact = new Contact();
        $contact->name = $name;
        $contact->phone = $phone;
        $contact->save();

        return redirect('/');
    }
}
