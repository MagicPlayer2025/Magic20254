

<?php $__env->startSection('title', 'Услуги — StyleCut'); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>УСЛУГИ</h1>
        <p>Полный спектр парикмахерских услуг для вашего идеального образа</p>
        <div class="breadcrumb">
            <a href="<?php echo e(route('home')); ?>">Главная</a> / <span>Услуги</span>
        </div>
    </div>
</section>


<section class="section section--services-page">
    <div class="container">
        <div class="services-grid services-grid--full">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="service-card service-card--detailed">
                <div class="service-card__icon">
                    <img src="<?php echo e(asset('images/icons/' . ($service->icon ?? 'scissors.svg'))); ?>" alt="<?php echo e($service->name); ?>">
                </div>
                <h3 class="service-card__title"><?php echo e($service->name); ?></h3>
                <p class="service-card__desc"><?php echo e($service->description); ?></p>
                <div class="service-card__meta">
                    <span class="service-card__duration"><?php echo e($service->duration_minutes); ?> мин.</span>
                    <span class="service-card__price"><?php echo e(number_format($service->price, 0, ',', ' ')); ?> ₽</span>
                </div>
                <a href="<?php echo e(route('appointment')); ?>" class="btn btn--sm btn--primary">Записаться</a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="section section--cta">
    <div class="container">
        <h2>Не нашли нужную услугу?</h2>
        <p>Позвоните нам, и мы подберём оптимальный вариант для вас</p>
        <div class="cta__actions">
            <a href="tel:+79991234567" class="btn btn--primary btn--lg">ПОЗВОНИТЬ</a>
            <a href="<?php echo e(route('appointment')); ?>" class="btn btn--outline btn--lg">ЗАПИСАТЬСЯ ОНЛАЙН</a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\моя практика\Проект\resources\views/pages/services.blade.php ENDPATH**/ ?>