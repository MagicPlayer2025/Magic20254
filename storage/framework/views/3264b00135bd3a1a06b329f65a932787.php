<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Админка — StyleCut'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>
    <header class="admin-header">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo-text">StyleCut Admin</a>
        <nav>
            <a href="<?php echo e(route('home')); ?>">Сайт</a>
            <a href="<?php echo e(route('admin.services')); ?>">Услуги</a>
            <a href="<?php echo e(route('admin.appointments')); ?>">Записи</a>
            <a href="<?php echo e(route('admin.gallery')); ?>">Галерея</a>
            <a href="<?php echo e(route('admin.reviews')); ?>">Отзывы</a>
            <a href="<?php echo e(route('admin.contacts')); ?>">Контакты</a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit">Выйти</button>
            </form>
        </nav>
    </header>
    <main class="admin-main">
        <?php if(session('success')): ?>
            <div class="alert alert--success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert--error"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html>
<?php /**PATH D:\моя практика\Проект\resources\views/layouts/admin.blade.php ENDPATH**/ ?>