<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Master;
use App\Models\GalleryItem;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Услуги
        $services = [
            ['name' => 'Мужская стрижка', 'description' => 'Стрижка любой сложности с укладкой', 'duration_minutes' => 60, 'price' => 1500, 'category' => 'men', 'sort_order' => 1],
            ['name' => 'Стрижка бороды', 'description' => 'Моделирование и стрижка бороды', 'duration_minutes' => 30, 'price' => 800, 'category' => 'beard', 'sort_order' => 2],
            ['name' => 'Укладка', 'description' => 'Профессиональная укладка волос', 'duration_minutes' => 45, 'price' => 1000, 'category' => 'styling', 'sort_order' => 3],
            ['name' => 'Окрашивание', 'description' => 'Окрашивание в один тон', 'duration_minutes' => 90, 'price' => 3000, 'category' => 'coloring', 'sort_order' => 4],
            ['name' => 'Мелирование', 'description' => 'Мелирование волос любой сложности', 'duration_minutes' => 120, 'price' => 4500, 'category' => 'coloring', 'sort_order' => 5],
            ['name' => 'Комплекс услуг', 'description' => 'Стрижка + Борода + Укладка', 'duration_minutes' => 90, 'price' => 2500, 'category' => 'complex', 'sort_order' => 6],
            ['name' => 'Женская стрижка', 'description' => 'Стрижка любой сложности', 'duration_minutes' => 60, 'price' => 2000, 'category' => 'women', 'sort_order' => 7],
            ['name' => 'Детская стрижка', 'description' => 'Стрижка для детей до 12 лет', 'duration_minutes' => 30, 'price' => 800, 'category' => 'children', 'sort_order' => 8],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Мастера
        $masters = [
            ['name' => 'Алексей Иванов', 'position' => 'Барбер', 'experience_years' => 8, 'sort_order' => 1],
            ['name' => 'Дмитрий Смирнов', 'position' => 'Барбер', 'experience_years' => 5, 'sort_order' => 2],
            ['name' => 'Анастасия Кузнецова', 'position' => 'Стилист', 'experience_years' => 4, 'sort_order' => 3],
            ['name' => 'Екатерина Волкова', 'position' => 'Стилист', 'experience_years' => 3, 'sort_order' => 4],
        ];

        foreach ($masters as $master) {
            $m = Master::create($master);
            // Привязываем все услуги к мастерам
            $m->services()->attach(Service::pluck('id'));
        }

        // Галерея
        $galleryCategories = ['men', 'women', 'coloring', 'beard', 'interior'];
        for ($i = 1; $i <= 15; $i++) {
            GalleryItem::create([
                'title' => 'Работа ' . $i,
                'image' => 'gallery/work-' . $i . '.jpg',
                'category' => $galleryCategories[array_rand($galleryCategories)],
                'sort_order' => $i,
            ]);
        }

        // Отзывы
        $reviews = [
            ['client_name' => 'Михаил К.', 'rating' => 5, 'text' => 'Отличная стрижка! Мастер Алексей — настоящий профессионал. Рекомендую всем!', 'master_id' => 1, 'is_published' => true],
            ['client_name' => 'Андрей П.', 'rating' => 5, 'text' => 'Хожу сюда уже год. Всегда доволен результатом. Приятная атмосфера и профессиональный подход.', 'master_id' => 2, 'is_published' => true],
            ['client_name' => 'Елена С.', 'rating' => 4, 'text' => 'Прекрасный салон! Анастасия сделала мне потрясающую укладку. Обязательно вернусь!', 'master_id' => 3, 'is_published' => true],
            ['client_name' => 'Дмитрий В.', 'rating' => 5, 'text' => 'Лучшая парикмахерская в районе. Быстро, качественно и по адекватной цене.', 'master_id' => 1, 'is_published' => true],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
