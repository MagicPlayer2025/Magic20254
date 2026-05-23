@extends('layouts.app')

@section('title', 'Вход — StyleCut')

@section('content')
<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>Вход</h1>
        <p>Войдите, чтобы видеть историю записей и уведомления.</p>
    </div>
</section>

<section class="section">
    <div class="container auth-wrap">
        <form method="POST" action="{{ route('login.store') }}" class="auth-card">
            @csrf
            @if($errors->any())
                <div class="alert alert--error">{{ $errors->first() }}</div>
            @endif
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group form-group--checkbox">
                <label><input type="checkbox" name="remember" value="1"> Запомнить меня</label>
            </div>
            <button class="btn btn--primary" type="submit">Войти</button>
            <p class="auth-note">Нет аккаунта? <a href="{{ route('register') }}">Зарегистрироваться</a></p>
            <p class="auth-note">Админ: admin@stylecut.local / admin123</p>
        </form>
    </div>
</section>
@endsection
