<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Contact;
use App\Models\GalleryItem;
use App\Models\Master;
use App\Models\NewsletterSubscription;
use App\Models\Review;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\UserNotification;
use App\Models\Visit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'users' => User::count(),
            'appointments' => Appointment::count(),
            'pendingAppointments' => Appointment::where('status', 'pending')->count(),
            'visits' => Visit::count(),
            'subscriptions' => NewsletterSubscription::where('is_active', true)->count(),
        ];

        $masterLoad = Master::withCount('appointments')->orderByDesc('appointments_count')->get();
        $popularPages = Visit::selectRaw('path, count(*) as total')->groupBy('path')->orderByDesc('total')->limit(8)->get();
        $recentAppointments = Appointment::with(['service', 'master', 'user'])->latest()->limit(8)->get();

        return view('admin.dashboard', compact('stats', 'masterLoad', 'popularPages', 'recentAppointments'));
    }

    public function services()
    {
        $services = Service::orderBy('sort_order')->get();

        return view('admin.services', compact('services'));
    }

    public function storeService(Request $request)
    {
        Service::create($this->validateService($request));

        return back()->with('success', 'Услуга добавлена.');
    }

    public function updateService(Request $request, Service $service)
    {
        $service->update($this->validateService($request));

        return back()->with('success', 'Услуга обновлена.');
    }

    public function deleteService(Service $service)
    {
        $service->delete();

        return back()->with('success', 'Услуга удалена.');
    }

    public function appointments()
    {
        $appointments = Appointment::with(['service', 'master', 'user'])->latest()->get();

        return view('admin.appointments', compact('appointments'));
    }

    public function updateAppointment(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,confirmed,completed,cancelled'],
            'appointment_date' => ['required', 'date'],
            'appointment_time' => ['required'],
        ]);

        $appointment->update($validated);
        $this->notifyUser($appointment, 'Статус записи обновлён', 'Текущий статус: ' . $validated['status']);

        return back()->with('success', 'Запись обновлена.');
    }

    public function gallery()
    {
        $items = GalleryItem::orderBy('sort_order')->get();

        return view('admin.gallery', compact('items'));
    }

    public function storeGallery(Request $request)
    {
        GalleryItem::create($this->validateGallery($request));

        return back()->with('success', 'Фото добавлено в галерею.');
    }

    public function updateGallery(Request $request, GalleryItem $galleryItem)
    {
        $galleryItem->update($this->validateGallery($request));

        return back()->with('success', 'Фото обновлено.');
    }

    public function deleteGallery(GalleryItem $galleryItem)
    {
        $galleryItem->delete();

        return back()->with('success', 'Фото удалено.');
    }

    public function reviews()
    {
        $reviews = Review::with('master')->latest()->get();

        return view('admin.reviews', compact('reviews'));
    }

    public function updateReview(Request $request, Review $review)
    {
        $validated = $request->validate([
            'is_published' => ['nullable', 'boolean'],
        ]);

        $review->update([
            'is_published' => (bool) ($validated['is_published'] ?? false),
        ]);

        return back()->with('success', 'Отзыв обновлён.');
    }

    public function deleteReview(Review $review)
    {
        $review->delete();

        return back()->with('success', 'Отзыв удалён.');
    }

    public function contacts()
    {
        $contacts = Contact::latest()->get();
        $settings = SiteSetting::pluck('value', 'key');

        return view('admin.contacts', compact('contacts', 'settings'));
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);

        foreach ($validated as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back()->with('success', 'Контактная информация обновлена.');
    }

    private function validateService(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'duration_minutes' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'min:0'],
            'category' => ['required', 'string', 'max:100'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]) + ['is_active' => false, 'sort_order' => 0];
    }

    private function validateGallery(Request $request): array
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'required_without:image_file', 'string', 'max:255'],
            'image_file' => ['nullable', 'image', 'max:4096'],
            'category' => ['required', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]) + ['is_active' => false, 'sort_order' => 0];

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $name = 'upload-' . now()->format('YmdHis') . '-' . uniqid() . '.' . $file->extension();
            $file->move(public_path('images/gallery'), $name);
            $validated['image'] = 'gallery/' . $name;
        }

        unset($validated['image_file']);

        return $validated;
    }

    private function notifyUser(Appointment $appointment, string $title, string $message): void
    {
        if (! $appointment->user_id) {
            return;
        }

        UserNotification::create([
            'user_id' => $appointment->user_id,
            'title' => $title,
            'message' => $message,
        ]);
    }
}
