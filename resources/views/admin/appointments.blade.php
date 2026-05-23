@extends('layouts.admin')

@section('title', 'Записи — Админка')

@section('content')
<h1>Управление записями</h1>

<section class="admin-panel">
    <table class="admin-table">
        <thead><tr><th>Клиент</th><th>Контакты</th><th>Услуга</th><th>Мастер</th><th>Дата и статус</th><th></th></tr></thead>
        <tbody>
        @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->client_name }}<br><small>{{ $appointment->user?->email }}</small></td>
                <td>{{ $appointment->client_phone }}<br>{{ $appointment->client_email }}</td>
                <td>{{ $appointment->service?->name }}</td>
                <td>{{ $appointment->master?->name }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.appointments.update', $appointment) }}" class="admin-inline-form">
                        @csrf
                        @method('PUT')
                        <input type="date" name="appointment_date" value="{{ $appointment->appointment_date?->format('Y-m-d') }}" required>
                        <input type="time" name="appointment_time" value="{{ substr($appointment->appointment_time, 0, 5) }}" required>
                        <select name="status">
                            @foreach(['pending', 'confirmed', 'completed', 'cancelled'] as $status)
                                <option value="{{ $status }}" @selected($appointment->status === $status)>{{ $status }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn--primary btn--sm" type="submit">Обновить</button>
                    </form>
                </td>
                <td>{{ number_format($appointment->total_price, 0, ',', ' ') }} ₽</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>
@endsection
