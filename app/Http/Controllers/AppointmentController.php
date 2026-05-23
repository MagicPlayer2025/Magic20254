<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Master;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $services = Service::active()->orderBy('sort_order')->get();
        $masters = Master::active()->orderBy('sort_order')->get();

        return view('pages.appointment', compact('services', 'masters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'master_id' => 'required|exists:masters,id',
            'client_name' => 'required|string|max:255',
            'client_phone' => 'required|string|max:20',
            'client_email' => 'nullable|email|max:255',
            'appointment_date' => 'required|date|after:today',
            'appointment_time' => 'required',
            'comment' => 'nullable|string|max:1000',
        ]);

        $service = Service::findOrFail($validated['service_id']);
        $validated['total_price'] = $service->price;
        $validated['user_id'] = $request->user()?->id;

        Appointment::create($validated);

        return redirect()->route('appointment')->with('success', 'Запись успешно создана! Мы свяжемся с вами для подтверждения.');
    }
}
