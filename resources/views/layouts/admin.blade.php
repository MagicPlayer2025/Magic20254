<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Админка — StyleCut')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="admin-header">
        <a href="{{ route('admin.dashboard') }}" class="logo-text">StyleCut Admin</a>
        <nav>
            <a href="{{ route('home') }}">Сайт</a>
            <a href="{{ route('admin.services') }}">Услуги</a>
            <a href="{{ route('admin.appointments') }}">Записи</a>
            <a href="{{ route('admin.gallery') }}">Галерея</a>
            <a href="{{ route('admin.reviews') }}">Отзывы</a>
            <a href="{{ route('admin.contacts') }}">Контакты</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Выйти</button>
            </form>
        </nav>
    </header>
    <main class="admin-main">
        @if(session('success'))
            <div class="alert alert--success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert--error">{{ $errors->first() }}</div>
        @endif
        @yield('content')
    </main>
</body>
</html>
