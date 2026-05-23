@extends('layouts.app')

@section('title', 'Контакты — StyleCut')

@section('content')
{{-- Hero --}}
<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>КОНТАКТЫ</h1>
        <p>Мы всегда рады видеть вас в нашей парикмахерской<br>Свяжитесь с нами любым удобным способом</p>
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Главная</a> / <span>Контакты</span>
        </div>
    </div>
</section>

{{-- Contact Info Cards --}}
<section class="section section--contact-info">
    <div class="container">
        <div class="contact-cards">
            <div class="contact-card">
                <div class="contact-card__icon">📞</div>
                <h3>Телефон</h3>
                <p>+7 (999) 123-45-67</p>
                <a href="tel:+79991234567">Позвонить</a>
            </div>
            <div class="contact-card">
                <div class="contact-card__icon">✉️</div>
                <h3>Email</h3>
                <p>info@stylecut.ru</p>
                <a href="mailto:info@stylecut.ru">Написать нам</a>
            </div>
            <div class="contact-card">
                <div class="contact-card__icon">📍</div>
                <h3>Адрес</h3>
                <p>г. Москва, ул. Примерная, 123</p>
                <a href="#">Как добраться</a>
            </div>
            <div class="contact-card">
                <div class="contact-card__icon">🕐</div>
                <h3>Режим работы</h3>
                <p>Пн - Вс: 10:00 - 21:00</p>
                <span>Без выходных</span>
            </div>
        </div>
    </div>
</section>

{{-- Contact Form & Map --}}
<section class="section section--contact-form">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-form-wrap">
                <h2>Напишите нам</h2>
                <p>Остались вопросы? Заполните форму, и мы свяжемся с вами</p>

                @if(session('success'))
                    <div class="alert alert--success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('contacts.store') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Ваше имя*" required value="{{ old('name') }}">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" placeholder="Телефон*" required value="{{ old('phone') }}">
                            @error('phone') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Тема обращения" value="{{ old('subject') }}">
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Сообщение*" rows="5" required>{{ old('message') }}</textarea>
                        @error('message') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group form-group--checkbox">
                        <label>
                            <input type="checkbox" required>
                            Я согласен на обработку персональных данных
                        </label>
                    </div>
                    <button type="submit" class="btn btn--primary">ОТПРАВИТЬ СООБЩЕНИЕ</button>
                </form>
            </div>

            <div class="contact-map-wrap">
                <h2>Мы на карте</h2>
                <div class="contact-map">
                    <div class="map-placeholder">
                        <p>Карта загружается...</p>
                        <small>г. Москва, ул. Примерная, 123</small>
                    </div>
                </div>

                <div class="how-to-get">
                    <h3>Как добраться</h3>
                    <div class="transport-item">
                        <strong>🚇 Метро</strong>
                        <p>м. Цветной бульвар — 5 минут пешком<br>м. Трубная — 7 минут пешком</p>
                    </div>
                    <div class="transport-item">
                        <strong>🚌 Автобус</strong>
                        <p>Остановка «Цветной бульвар» — 2 минуты<br>Автобусы: 24, 38, 101, 124</p>
                    </div>
                    <div class="transport-item">
                        <strong>🚗 На автомобиле</strong>
                        <p>Удобная парковка рядом с салоном</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Call CTA --}}
<section class="section section--call-cta">
    <div class="container">
        <div class="call-cta">
            <div class="call-cta__text">
                <h2>Есть вопросы? Позвоните нам!</h2>
                <p>Наш администратор ответит на все ваши вопросы и поможет с записью</p>
            </div>
            <a href="tel:+79991234567" class="call-cta__phone">
                <span>+7 (999) 123-45-67</span>
                <small>звонок бесплатный</small>
            </a>
        </div>
    </div>
</section>
@endsection
