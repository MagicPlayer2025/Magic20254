<?php $__env->startSection('title', 'О нас — StyleCut'); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>О НАС</h1>
        <p>Создаём стиль, подчёркиваем индивидуальность</p>
        <div class="breadcrumb">
            <a href="<?php echo e(route('home')); ?>">Главная</a> / <span>О нас</span>
        </div>
    </div>
</section>


<section class="section section--history">
    <div class="container">
        <div class="history-grid">
            <div class="history__text">
                <h2>Наша история</h2>
                <p>Парикмахерская StyleCut была основана в 2018 году с идеей создать место, где каждый клиент сможет получить не просто стрижку, а индивидуальный образ и уверенность в себе.</p>
                <p>Мы собрали команду профессионалов, которые любят своё дело и следят за последними трендами в мире стиля.</p>
            </div>
            <div class="history__image">
                <img src="<?php echo e(asset('images/about/salon.png')); ?>" alt="Интерьер салона StyleCut">
            </div>
        </div>
    </div>
</section>


<section class="section section--values">
    <div class="container">
        <div class="values-grid">
            <div class="value-card">
                <div class="value-card__icon">⭐</div>
                <h3>Профессионализм</h3>
                <p>Наши мастера регулярно проходят обучение и повышают квалификацию.</p>
            </div>
            <div class="value-card">
                <div class="value-card__icon">💎</div>
                <h3>Качество</h3>
                <p>Используем только проверенные материалы премиум-класса.</p>
            </div>
            <div class="value-card">
                <div class="value-card__icon">❤️</div>
                <h3>Индивидуальный подход</h3>
                <p>Мы учитываем пожелания каждого клиента и создаём уникальный образ.</p>
            </div>
            <div class="value-card">
                <div class="value-card__icon">🏠</div>
                <h3>Комфорт</h3>
                <p>Уютная атмосфера, внимание к деталям и забота о вас.</p>
            </div>
        </div>
    </div>
</section>


<section class="section section--team">
    <div class="container">
        <h2 class="section__title">Наша команда</h2>
        <div class="masters-grid">
            <?php $__currentLoopData = $masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="master-card">
                <div class="master-card__photo">
                    <img src="<?php echo e(asset('images/masters/' . ($master->photo ?? 'default.png'))); ?>" alt="<?php echo e($master->name); ?>">
                </div>
                <h3 class="master-card__name"><?php echo e($master->name); ?></h3>
                <p class="master-card__position"><?php echo e($master->position); ?></p>
                <p class="master-card__exp">Опыт работы: <?php echo e($master->experience_years); ?> <?php echo e($master->experience_years >= 5 ? 'лет' : 'года'); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="section section--choose">
    <div class="container">
        <div class="choose-grid">
            <div class="choose__image">
                <img src="<?php echo e(asset('images/about/barber-work.png')); ?>" alt="Мастер за работой">
            </div>
            <div class="choose__text">
                <h2>Почему выбирают нас?</h2>
                <ul class="choose__list">
                    <li>Опытные и дружелюбные мастера</li>
                    <li>Современные техники и тренды</li>
                    <li>Онлайн-запись без ожидания</li>
                    <li>Доступные цены и акции</li>
                    <li>Тысячи довольных клиентов</li>
                </ul>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\marse\OneDrive\Desktop\Практика\resources\views/pages/about.blade.php ENDPATH**/ ?>