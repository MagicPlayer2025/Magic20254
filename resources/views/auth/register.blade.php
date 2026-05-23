@extends('layouts.app')

@section('title', 'Регистрация — StyleCut')

@section('content')
<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>Регистрация</h1>
        <p>Создайте личный кабинет для записей и уведомлений.</p>
    </div>
</section>

<section class="section">
    <div class="container auth-wrap">
        <form method="POST" action="{{ route('register.store') }}" class="auth-card">
            @csrf
            @if($errors->any())
                <div class="alert alert--error">{{ $errors->first() }}</div>
            @endif
            <div class="form-group">
                <label>Имя</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label>Телефон</label>
                <input type="tel" name="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label>Повтор пароля</label>
                    <input type="password" name="password_confirmation" required>
                </div>
            </div>
            <button class="btn btn--primary" type="submit">Создать аккаунт</button>
            <p class="auth-note">Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a></p>
        </form>
    </div>
</section>
@endsection
