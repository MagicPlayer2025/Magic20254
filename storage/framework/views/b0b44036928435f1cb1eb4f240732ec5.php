<?php
    $sitePhone = \App\Models\SiteSetting::getValue('phone', '+7 (999) 123-45-67');
    $sitePhoneHref = preg_replace('/\D+/', '', $sitePhone);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="StyleCut — парикмахерская в Москве. Мужские и женские стрижки, окрашивание, укладки.">
    <title><?php echo $__env->yieldContent('title', 'StyleCut — Парикмахерская'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>
    <header class="header">
        <div class="container header__inner">
            <a href="<?php echo e(route('home')); ?>" class="header__logo">
                <span class="logo-text">StyleCut</span>
                <span class="logo-sub">ПАРИКМАХЕРСКАЯ</span>
            </a>
            <nav class="header__nav">
                <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Главная</a>
                <a href="<?php echo e(route('services')); ?>" class="nav-link <?php echo e(request()->routeIs('services') ? 'active' : ''); ?>">Услуги</a>
                <a href="<?php echo e(route('about')); ?>" class="nav-link <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>">О нас</a>
                <a href="<?php echo e(route('gallery')); ?>" class="nav-link <?php echo e(request()->routeIs('gallery') ? 'active' : ''); ?>">Галерея</a>
                <a href="<?php echo e(route('reviews')); ?>" class="nav-link <?php echo e(request()->routeIs('reviews') ? 'active' : ''); ?>">Отзывы</a>
                <a href="<?php echo e(route('contacts')); ?>" class="nav-link <?php echo e(request()->routeIs('contacts') ? 'active' : ''); ?>">Контакты</a>
            </nav>
            <div class="header__actions">
                <a href="tel:+<?php echo e($sitePhoneHref); ?>" class="header__phone"><?php echo e($sitePhone); ?></a>
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->is_admin): ?>
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link">Админка</a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('profile')); ?>" class="nav-link">Кабинет</a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="header-form">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="nav-link">Выйти</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="nav-link">Войти</a>
                <?php endif; ?>
                <a href="<?php echo e(route('appointment')); ?>" class="btn btn--primary">Записаться</a>
            </div>
            <button class="header__burger" aria-label="Меню">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="footer__col">
                    <a href="<?php echo e(route('home')); ?>" class="footer__logo">
                        <span class="logo-text">StyleCut</span>
                        <span class="logo-sub">ПАРИКМАХЕРСКАЯ</span>
                    </a>
                    <p class="footer__desc">Создаём стиль и подчёркиваем индивидуальность с 2018 года.</p>
                    <div class="footer__socials">
                        <a href="#" aria-label="ВКонтакте">VK</a>
                        <a href="#" aria-label="Instagram">IG</a>
                        <a href="#" aria-label="Telegram">TG</a>
                    </div>
                </div>
                <div class="footer__col">
                    <h4>Навигация</h4>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>">Главная</a></li>
                        <li><a href="<?php echo e(route('services')); ?>">Услуги</a></li>
                        <li><a href="<?php echo e(route('about')); ?>">О нас</a></li>
                        <li><a href="<?php echo e(route('gallery')); ?>">Галерея</a></li>
                        <li><a href="<?php echo e(route('reviews')); ?>">Отзывы</a></li>
                        <li><a href="<?php echo e(route('contacts')); ?>">Контакты</a></li>
                    </ul>
                </div>
                <div class="footer__col">
                    <h4>Новости и акции</h4>
                    <form method="POST" action="<?php echo e(route('newsletter.store')); ?>" class="newsletter-form">
                        <?php echo csrf_field(); ?>
                        <input type="email" name="email" placeholder="Ваш email" value="<?php echo e(auth()->user()?->email); ?>" required>
                        <input type="hidden" name="name" value="<?php echo e(auth()->user()?->name); ?>">
                        <button class="btn btn--primary btn--sm" type="submit">Подписаться</button>
                    </form>
                </div>
                <div class="footer__col">
                    <h4>Контакты</h4>
                    <ul>
                        <li><?php echo e($sitePhone); ?></li>
                        <li><?php echo e(\App\Models\SiteSetting::getValue('email', 'info@stylecut.ru')); ?></li>
                        <li><?php echo e(\App\Models\SiteSetting::getValue('address', 'г. Москва, ул. Примерная, 123')); ?></li>
                        <li>Пн - Вс: 10:00 - 21:00</li>
                    </ul>
                </div>
            </div>
            <div class="footer__bottom">
                <p>&copy; 2026 StyleCut. Все права защищены.</p>
                <a href="<?php echo e(route('register')); ?>">Личный кабинет</a>
            </div>
        </div>
    </footer>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\моя практика\Проект\resources\views/layouts/app.blade.php ENDPATH**/ ?>