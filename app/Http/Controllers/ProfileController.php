<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $appointments = $user->appointments()->with(['service', 'master'])->latest()->get();
        $notifications = $user->notificationsList()->latest()->get();
        $subscription = NewsletterSubscription::where('email', $user->email)->first();

        return view('profile.index', compact('user', 'appointments', 'notifications', 'subscription'));
    }

    public function markNotifications(Request $request)
    {
        $request->user()->notificationsList()->whereNull('read_at')->update(['read_at' => now()]);

        return back()->with('success', 'Уведомления отмечены как прочитанные.');
    }
}
