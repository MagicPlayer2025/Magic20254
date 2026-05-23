@extends('layouts.admin')

@section('title', 'Услуги — Админка')

@section('content')
<h1>Управление услугами</h1>

<section class="admin-panel">
    <h2>Добавить услугу</h2>
    <form method="POST" action="{{ route('admin.services.store') }}" class="admin-form-grid">
        @csrf
        <input name="name" placeholder="Название" required>
        <input name="duration_minutes" type="number" placeholder="Минуты" required>
        <input name="price" type="number" step="0.01" placeholder="Цена" required>
        <input name="category" placeholder="Категория" required>
        <input name="icon" placeholder="Иконка, например men-cut.svg">
        <input name="sort_order" type="number" placeholder="Порядок" value="0">
        <textarea name="description" placeholder="Описание"></textarea>
        <label><input type="checkbox" name="is_active" value="1" checked> Активна</label>
        <button class="btn btn--primary" type="submit">Добавить</button>
    </form>
</section>

<section class="admin-panel">
    <h2>Список услуг</h2>
    @foreach($services as $service)
        <form method="POST" action="{{ route('admin.services.update', $service) }}" class="admin-edit-row">
            @csrf
            @method('PUT')
            <input name="name" value="{{ $service->name }}" required>
            <input name="duration_minutes" type="number" value="{{ $service->duration_minutes }}" required>
            <input name="price" type="number" step="0.01" value="{{ $service->price }}" required>
            <input name="category" value="{{ $service->category }}" required>
            <input name="icon" value="{{ $service->icon }}">
            <input name="sort_order" type="number" value="{{ $service->sort_order }}">
            <textarea name="description">{{ $service->description }}</textarea>
            <label><input type="checkbox" name="is_active" value="1" @checked($service->is_active)> Активна</label>
            <button class="btn btn--primary btn--sm" type="submit">Сохранить</button>
        </form>
        <form method="POST" action="{{ route('admin.services.delete', $service) }}">
            @csrf
            @method('DELETE')
            <button class="admin-danger" type="submit">Удалить услугу</button>
        </form>
    @endforeach
</section>
@endsection
