@extends('layouts.admin')

@section('title', 'Отзывы — Админка')

@section('content')
<h1>Модерация отзывов</h1>

<section class="admin-panel">
    <table class="admin-table">
        <thead><tr><th>Клиент</th><th>Мастер</th><th>Оценка</th><th>Текст</th><th>Публикация</th><th></th></tr></thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->client_name }}</td>
                <td>{{ $review->master?->name }}</td>
                <td>{{ $review->rating }}</td>
                <td>{{ $review->text }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.reviews.update', $review) }}">
                        @csrf
                        @method('PUT')
                        <label><input type="checkbox" name="is_published" value="1" @checked($review->is_published)> Опубликован</label>
                        <button class="btn btn--primary btn--sm" type="submit">Сохранить</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.reviews.delete', $review) }}">
                        @csrf
                        @method('DELETE')
                        <button class="admin-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>
@endsection
