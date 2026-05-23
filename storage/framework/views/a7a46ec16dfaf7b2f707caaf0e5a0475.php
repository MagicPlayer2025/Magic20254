<?php $__env->startSection('title', 'StyleCut — Парикмахерская в Москве'); ?>

<?php $__env->startSection('content'); ?>

<section class="hero">
    <div class="hero__overlay"></div>
    <div class="container hero__content">
        <h1 class="hero__title">Создаём стиль,<br>подчёркиваем индивидуальность</h1>
        <p class="hero__subtitle">Профессиональные стрижки и уход за волосами в самом сердце Москвы</p>
        <div class="hero__actions">
            <a href="<?php echo e(route('appointment')); ?>" class="btn btn--primary btn--lg">ЗАПИСАТЬСЯ</a>
            <a href="<?php echo e(route('services')); ?>" class="btn btn--outline btn--lg">НАШИ УСЛУГИ</a>
        </div>
    </div>
</section>


<section class="section section--services">
    <div class="container">
        <h2 class="section__title">Наши услуги</h2>
        <p class="section__subtitle">Широкий спектр услуг для вашего идеального образа</p>
        <div class="services-grid">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="service-card">
                <div class="service-card__icon">
                    <img src="<?php echo e(asset('images/icons/' . ($service->icon ?? 'scissors.svg'))); ?>" alt="<?php echo e($service->name); ?>">
                </div>
                <h3 class="service-card__title"><?php echo e($service->name); ?></h3>
                <p class="service-card__desc"><?php echo e($service->description); ?></p>
                <div class="service-card__meta">
                    <span class="service-card__duration"><?php echo e($service->duration_minutes); ?> мин.</span>
                    <span class="service-card__price"><?php echo e(number_format($service->price, 0, ',', ' ')); ?> ₽</span>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="section__action">
            <a href="<?php echo e(route('services')); ?>" class="btn btn--outline">Показать все услуги</a>
        </div>
    </div>
</section>


<section class="section section--masters">
    <div class="container">
        <h2 class="section__title">Наши мастера</h2>
        <p class="section__subtitle">Профессионалы своего дела с многолетним опытом</p>
        <div class="masters-grid">
            <?php $__currentLoopData = $masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="master-card">
                <div class="master-card__photo">
                    <img src="<?php echo e(asset('images/masters/' . ($master->photo ?? 'default.png'))); ?>" alt="<?php echo e($master->name); ?>">
                </div>
                <h3 class="master-card__name"><?php echo e($master->name); ?></h3>
                <p class="master-card__position"><?php echo e($master->position); ?></p>
                <p class="master-card__exp">Опыт работы: <?php echo e($master->experience_years); ?> лет</p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="section section--why">
    <div class="container">
        <h2 class="section__title">Почему удобно записываться онлайн?</h2>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-card__icon">⏰</div>
                <h3>Экономия времени</h3>
                <p>Записывайтесь в любое удобное время, не выходя из дома.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-card__icon">👤</div>
                <h3>Выбор мастера и времени</h3>
                <p>Вы сами выбираете мастера и удобное время для посещения.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-card__icon">🔔</div>
                <h3>Напоминания</h3>
                <p>Мы напомним вам о записи за день до визита.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-card__icon">⭐</div>
                <h3>Гарантия качества</h3>
                <p>Мы ценим каждого клиента и гарантируем отличный результат.</p>
            </div>
        </div>
    </div>
</section>


<section class="section section--cta">
    <div class="container">
        <h2>Готовы изменить свой стиль?</h2>
        <p>Запишитесь прямо сейчас и почувствуйте разницу!</p>
        <div class="cta__actions">
            <a href="<?php echo e(route('appointment')); ?>" class="btn btn--primary btn--lg">ЗАПИСАТЬСЯ</a>
            <a href="tel:+79991234567" class="btn btn--outline btn--lg">ПОЗВОНИТЬ</a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\моя практика\Проект\resources\views/pages/home.blade.php ENDPATH**/ ?>