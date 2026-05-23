@extends('layouts.admin')

@section('title', 'Панель управления — StyleCut')

@section('content')
<h1>Панель управления</h1>

<div class="admin-stats">
    <div><strong>{{ $stats['users'] }}</strong><span>Пользователи</span></div>
    <div><strong>{{ $stats['appointments'] }}</strong><span>Записи</span></div>
    <div><strong>{{ $stats['pendingAppointments'] }}</strong><span>Ожидают</span></div>
    <div><strong>{{ $stats['visits'] }}</strong><span>Посещения</span></div>
    <div><strong>{{ $stats['subscriptions'] }}</strong><span>Подписки</span></div>
</div>

<div class="admin-grid">
    <section class="admin-panel">
        <h2>Загрузка мастеров</h2>
        @foreach($masterLoad as $master)
            <div class="admin-line">
                <span>{{ $master->name }}</span>
                <strong>{{ $master->appointments_count }}</strong>
            </div>
        @endforeach
    </section>

    <section class="admin-panel">
        <h2>Популярные страницы</h2>
        @foreach($popularPages as $page)
            <div class="admin-line">
                <span>{{ $page->path }}</span>
                <strong>{{ $page->total }}</strong>
            </div>
        @endforeach
    </section>
</div>

<section class="admin-panel">
    <h2>Последние записи</h2>
    <table class="admin-table">
        <thead><tr><th>Клиент</th><th>Услуга</th><th>Мастер</th><th>Дата</th><th>Статус</th></tr></thead>
        <tbody>
        @foreach($recentAppointments as $appointment)
            <tr>
                <td>{{ $appointment->client_name }}</td>
                <td>{{ $appointment->service?->name }}</td>
                <td>{{ $appointment->master?->name }}</td>
                <td>{{ $appointment->appointment_date?->format('d.m.Y') }} {{ substr($appointment->appointment_time, 0, 5) }}</td>
                <td>{{ $appointment->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>
@endsection
