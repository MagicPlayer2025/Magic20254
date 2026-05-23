

<?php $__env->startSection('title', 'Отзывы — StyleCut'); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>ОТЗЫВЫ</h1>
        <p>Что говорят наши клиенты</p>
        <div class="breadcrumb">
            <a href="<?php echo e(route('home')); ?>">Главная</a> / <span>Отзывы</span>
        </div>
    </div>
</section>


<section class="section section--reviews">
    <div class="container">
        <div class="reviews-grid">
            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="review-card">
                <div class="review-card__header">
                    <div class="review-card__avatar"><?php echo e(mb_substr($review->client_name, 0, 1)); ?></div>
                    <div>
                        <h3 class="review-card__name"><?php echo e($review->client_name); ?></h3>
                        <?php if($review->master): ?>
                        <p class="review-card__master">Мастер: <?php echo e($review->master->name); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="review-card__rating">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <span class="<?php echo e($i <= $review->rating ? 'star--filled' : 'star--empty'); ?>">★</span>
                        <?php endfor; ?>
                    </div>
                </div>
                <p class="review-card__text"><?php echo e($review->text); ?></p>
                <span class="review-card__date"><?php echo e($review->created_at->format('d.m.Y')); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php echo e($reviews->links()); ?>

    </div>
</section>


<section class="section section--cta">
    <div class="container">
        <h2>Хотите оставить отзыв?</h2>
        <p>Мы будем рады вашей обратной связи</p>
        <div class="cta__actions">
            <a href="<?php echo e(route('appointment')); ?>" class="btn btn--primary btn--lg">ЗАПИСАТЬСЯ</a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\моя практика\Проект\resources\views/pages/reviews.blade.php ENDPATH**/ ?>