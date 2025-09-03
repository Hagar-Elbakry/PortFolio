<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function store(ContactRequest $request) {
                Contact::create($request->all());
                return redirect('/contact')->with('success', 'Thank you for contacting us! We will respond to you as soon as possible.');
    }
}
