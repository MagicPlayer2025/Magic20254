<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'name' => ['nullable', 'string', 'max:255'],
        ]);

        NewsletterSubscription::updateOrCreate(
            ['email' => $validated['email']],
            [
                'name' => $validated['name'] ?? $request->user()?->name,
                'user_id' => $request->user()?->id,
                'is_active' => true,
            ]
        );

        return back()->with('success', 'Подписка на новости и акции оформлена.');
    }
}
