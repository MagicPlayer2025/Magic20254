<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Master;
use App\Models\GalleryItem;
use App\Models\Review;

class PageController extends Controller
{
    public function home()
    {
        $services = Service::active()->orderBy('sort_order')->limit(6)->get();
        $masters = Master::active()->orderBy('sort_order')->limit(4)->get();
        $reviews = Review::published()->latest()->limit(3)->get();

        return view('pages.home', compact('services', 'masters', 'reviews'));
    }

    public function about()
    {
        $masters = Master::active()->orderBy('sort_order')->get();
        return view('pages.about', compact('masters'));
    }

    public function services()
    {
        $services = Service::active()->orderBy('sort_order')->get();
        return view('pages.services', compact('services'));
    }

    public function gallery()
    {
        $items = GalleryItem::active()->orderBy('sort_order')->get();
        $categories = GalleryItem::active()->distinct()->pluck('category');
        return view('pages.gallery', compact('items', 'categories'));
    }

    public function reviews()
    {
        $reviews = Review::published()->with('master')->latest()->paginate(10);
        return view('pages.reviews', compact('reviews'));
    }

    public function contacts()
    {
        return view('pages.contacts');
    }
}
