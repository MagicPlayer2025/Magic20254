@extends('layouts.app')

@section('title', 'Отзывы — StyleCut')

@section('content')
{{-- Hero --}}
<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>ОТЗЫВЫ</h1>
        <p>Что говорят наши клиенты</p>
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Главная</a> / <span>Отзывы</span>
        </div>
    </div>
</section>

{{-- Reviews List --}}
<section class="section section--reviews">
    <div class="container">
        <div class="reviews-grid">
            @foreach($reviews as $review)
            <div class="review-card">
                <div class="review-card__header">
                    <div class="review-card__avatar">{{ mb_substr($review->client_name, 0, 1) }}</div>
                    <div>
                        <h3 class="review-card__name">{{ $review->client_name }}</h3>
                        @if($review->master)
                        <p class="review-card__master">Мастер: {{ $review->master->name }}</p>
                        @endif
                    </div>
                    <div class="review-card__rating">
                        @for($i = 1; $i <= 5; $i++)
                            <span class="{{ $i <= $review->rating ? 'star--filled' : 'star--empty' }}">★</span>
                        @endfor
                    </div>
                </div>
                <p class="review-card__text">{{ $review->text }}</p>
                <span class="review-card__date">{{ $review->created_at->format('d.m.Y') }}</span>
            </div>
            @endforeach
        </div>

        {{ $reviews->links() }}
    </div>
</section>

{{-- CTA --}}
<section class="section section--cta">
    <div class="container">
        <h2>Хотите оставить отзыв?</h2>
        <p>Мы будем рады вашей обратной связи</p>
        <div class="cta__actions">
            <a href="{{ route('appointment') }}" class="btn btn--primary btn--lg">ЗАПИСАТЬСЯ</a>
        </div>
    </div>
</section>
@endsection
