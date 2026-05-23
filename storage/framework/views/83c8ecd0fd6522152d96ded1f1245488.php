<?php $__env->startSection('title', 'Галерея — StyleCut'); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero page-hero--dark">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>ГАЛЕРЕЯ</h1>
        <p>Наши работы и атмосфера, в которой создаётся ваш стиль</p>
        <div class="breadcrumb">
            <a href="<?php echo e(route('home')); ?>">Главная</a> / <span>Галерея</span>
        </div>
    </div>
</section>


<section class="section section--gallery">
    <div class="container">
        <div class="gallery-filter">
            <button class="filter-btn active" data-filter="all">Все</button>
            <button class="filter-btn" data-filter="men">Мужские стрижки</button>
            <button class="filter-btn" data-filter="women">Женские стрижки</button>
            <button class="filter-btn" data-filter="coloring">Окрашивание</button>
            <button class="filter-btn" data-filter="beard">Борода и усы</button>
            <button class="filter-btn" data-filter="interior">Интерьер</button>
        </div>

        <h2 class="section__title">Наши работы</h2>

        <div class="gallery-grid">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="gallery-item" data-category="<?php echo e($item->category); ?>">
                <img src="<?php echo e(asset('images/' . $item->image)); ?>" alt="<?php echo e($item->title ?? 'Работа'); ?>">
                <div class="gallery-item__overlay">
                    <span><?php echo e($item->title); ?></span>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="section__action">
            <button class="btn btn--outline" id="showMoreGallery">ПОКАЗАТЬ ВСЕ</button>
        </div>
    </div>
</section>


<section class="section section--cta">
    <div class="container cta--inline">
        <div class="cta__text">
            <h2>Готовы к преображению?</h2>
            <p>Запишитесь онлайн и доверьтесь нашим мастерам</p>
        </div>
        <a href="<?php echo e(route('appointment')); ?>" class="btn btn--primary btn--lg">ЗАПИСАТЬСЯ ОНЛАЙН</a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\моя практика\Проект\resources\views/pages/gallery.blade.php ENDPATH**/ ?>