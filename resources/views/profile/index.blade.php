@extends('layouts.app')

@section('title', 'Личный кабинет — StyleCut')

@section('content')
<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>Личный кабинет</h1>
        <p>{{ $user->name }}, здесь хранится история записей и уведомления.</p>
    </div>
</section>

<section class="section">
    <div class="container profile-grid">
        <div>
            @if(session('success'))
                <div class="alert alert--success">{{ session('success') }}</div>
            @endif

            <h2 class="section__title profile-title">История записей</h2>
            <div class="profile-list">
                @forelse($appointments as $appointment)
                    <div class="profile-row">
                        <strong>{{ $appointment->service?->name ?? 'Услуга' }}</strong>
                        <span>{{ $appointment->master?->name ?? 'Мастер' }}</span>
                        <span>{{ $appointment->appointment_date?->format('d.m.Y') }} {{ substr($appointment->appointment_time, 0, 5) }}</span>
                        <span class="status-badge status-{{ $appointment->status }}">{{ $appointment->status }}</span>
                    </div>
                @empty
                    <p class="empty-state">Записей пока нет.</p>
                @endforelse
            </div>
        </div>

        <aside class="profile-side">
            <h3>Уведомления</h3>
            @forelse($notifications as $notification)
                <div class="notification-item {{ $notification->read_at ? '' : 'is-unread' }}">
                    <strong>{{ $notification->title }}</strong>
                    <p>{{ $notification->message }}</p>
                    <small>{{ $notification->created_at->format('d.m.Y H:i') }}</small>
                </div>
            @empty
                <p class="empty-state">Новых уведомлений нет.</p>
            @endforelse

            <form method="POST" action="{{ route('profile.notifications.read') }}">
                @csrf
                <button class="btn btn--outline btn--sm" type="submit">Отметить прочитанными</button>
            </form>

            <h3>Новости и акции</h3>
            <form method="POST" action="{{ route('newsletter.store') }}">
                @csrf
                <input type="hidden" name="name" value="{{ $user->name }}">
                <div class="form-group">
                    <input type="email" name="email" value="{{ $user->email }}" required>
                </div>
                <button class="btn btn--primary btn--sm" type="submit">
                    {{ $subscription?->is_active ? 'Обновить подписку' : 'Подписаться' }}
                </button>
            </form>
        </aside>
    </div>
</section>
@endsection
