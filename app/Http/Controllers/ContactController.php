<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('user')->get();
        return view('contact.contact-us', compact('contacts'));
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'required'
        ]);

        Contact::create($attributes);

        return redirect('/contact-us')->with('success', 'Your message has been sent.');
    }
}
