@extends('layouts.app')

@section('title', 'Галерея — StyleCut')

@section('content')
{{-- Hero --}}
<section class="page-hero page-hero--dark">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>ГАЛЕРЕЯ</h1>
        <p>Наши работы и атмосфера, в которой создаётся ваш стиль</p>
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Главная</a> / <span>Галерея</span>
        </div>
    </div>
</section>

{{-- Gallery Filter --}}
<section class="section section--gallery">
    <div class="container">
        <div class="gallery-filter">
            <button class="filter-btn active" data-filter="all">Все</button>
            <button class="filter-btn" data-filter="men">Мужские стрижки</button>
            <button class="filter-btn" data-filter="women">Женские стрижки</button>
            <button class="filter-btn" data-filter="coloring">Окрашивание</button>
            <button class="filter-btn" data-filter="beard">Борода и усы</button>
            <button class="filter-btn" data-filter="interior">Интерьер</button>
        </div>

        <h2 class="section__title">Наши работы</h2>

        <div class="gallery-grid">
            @foreach($items as $item)
            <div class="gallery-item" data-category="{{ $item->category }}">
                <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->title ?? 'Работа' }}">
                <div class="gallery-item__overlay">
                    <span>{{ $item->title }}</span>
                </div>
            </div>
            @endforeach
        </div>

        <div class="section__action">
            <button class="btn btn--outline" id="showMoreGallery">ПОКАЗАТЬ ВСЕ</button>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="section section--cta">
    <div class="container cta--inline">
        <div class="cta__text">
            <h2>Готовы к преображению?</h2>
            <p>Запишитесь онлайн и доверьтесь нашим мастерам</p>
        </div>
        <a href="{{ route('appointment') }}" class="btn btn--primary btn--lg">ЗАПИСАТЬСЯ ОНЛАЙН</a>
    </div>
</section>
@endsection
