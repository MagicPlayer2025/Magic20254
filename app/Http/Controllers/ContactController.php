<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create($validated);

        return redirect()->route('contacts')->with('success', 'Сообщение отправлено! Мы свяжемся с вами в ближайшее время.');
    }
}
