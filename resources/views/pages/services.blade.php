@extends('layouts.app')

@section('title', 'Услуги — StyleCut')

@section('content')
{{-- Hero --}}
<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>УСЛУГИ</h1>
        <p>Полный спектр парикмахерских услуг для вашего идеального образа</p>
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Главная</a> / <span>Услуги</span>
        </div>
    </div>
</section>

{{-- Services List --}}
<section class="section section--services-page">
    <div class="container">
        <div class="services-grid services-grid--full">
            @foreach($services as $service)
            <div class="service-card service-card--detailed">
                <div class="service-card__icon">
                    <img src="{{ asset('images/icons/' . ($service->icon ?? 'scissors.svg')) }}" alt="{{ $service->name }}">
                </div>
                <h3 class="service-card__title">{{ $service->name }}</h3>
                <p class="service-card__desc">{{ $service->description }}</p>
                <div class="service-card__meta">
                    <span class="service-card__duration">{{ $service->duration_minutes }} мин.</span>
                    <span class="service-card__price">{{ number_format($service->price, 0, ',', ' ') }} ₽</span>
                </div>
                <a href="{{ route('appointment') }}" class="btn btn--sm btn--primary">Записаться</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="section section--cta">
    <div class="container">
        <h2>Не нашли нужную услугу?</h2>
        <p>Позвоните нам, и мы подберём оптимальный вариант для вас</p>
        <div class="cta__actions">
            <a href="tel:+79991234567" class="btn btn--primary btn--lg">ПОЗВОНИТЬ</a>
            <a href="{{ route('appointment') }}" class="btn btn--outline btn--lg">ЗАПИСАТЬСЯ ОНЛАЙН</a>
        </div>
    </div>
</section>
@endsection
