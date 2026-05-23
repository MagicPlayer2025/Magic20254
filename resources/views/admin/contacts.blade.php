@extends('layouts.admin')

@section('title', 'Контакты — Админка')

@section('content')
<h1>Контакты и обращения</h1>

<section class="admin-panel">
    <h2>Контактная информация</h2>
    <form method="POST" action="{{ route('admin.settings.update') }}" class="admin-form-grid">
        @csrf
        @method('PUT')
        <input name="phone" value="{{ $settings['phone'] ?? '' }}" placeholder="Телефон для кнопки Позвонить" required>
        <input name="email" value="{{ $settings['email'] ?? '' }}" placeholder="Email">
        <input name="address" value="{{ $settings['address'] ?? '' }}" placeholder="Адрес">
        <button class="btn btn--primary" type="submit">Сохранить</button>
    </form>
</section>

<section class="admin-panel">
    <h2>Обращения с формы</h2>
    <table class="admin-table">
        <thead><tr><th>Имя</th><th>Контакты</th><th>Тема</th><th>Сообщение</th><th>Дата</th></tr></thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}<br>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at->format('d.m.Y H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>
@endsection
