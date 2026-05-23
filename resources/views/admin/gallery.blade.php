@extends('layouts.admin')

@section('title', 'Галерея — Админка')

@section('content')
<h1>Управление галереей</h1>

<section class="admin-panel">
    <h2>Добавить фото</h2>
    <form method="POST" action="{{ route('admin.gallery.store') }}" class="admin-form-grid" enctype="multipart/form-data">
        @csrf
        <input name="title" placeholder="Название">
        <input name="image" placeholder="gallery/work-16.png">
        <input name="image_file" type="file" accept="image/*">
        <input name="category" placeholder="men, women, coloring, beard, interior" required>
        <input name="sort_order" type="number" value="0">
        <label><input type="checkbox" name="is_active" value="1" checked> Активно</label>
        <button class="btn btn--primary" type="submit">Добавить</button>
    </form>
</section>

<section class="admin-panel gallery-admin-grid">
    @foreach($items as $item)
        <div class="admin-gallery-item">
            <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->title }}">
            <form method="POST" action="{{ route('admin.gallery.update', $item) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input name="title" value="{{ $item->title }}">
                <input name="image" value="{{ $item->image }}" required>
                <input name="image_file" type="file" accept="image/*">
                <input name="category" value="{{ $item->category }}" required>
                <input name="sort_order" type="number" value="{{ $item->sort_order }}">
                <label><input type="checkbox" name="is_active" value="1" @checked($item->is_active)> Активно</label>
                <button class="btn btn--primary btn--sm" type="submit">Сохранить</button>
            </form>
            <form method="POST" action="{{ route('admin.gallery.delete', $item) }}">
                @csrf
                @method('DELETE')
                <button class="admin-danger" type="submit">Удалить</button>
            </form>
        </div>
    @endforeach
</section>
@endsection
