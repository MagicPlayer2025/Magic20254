<?php $__env->startSection('title', 'Личный кабинет — StyleCut'); ?>

<?php $__env->startSection('content'); ?>
<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>Личный кабинет</h1>
        <p><?php echo e($user->name); ?>, здесь хранится история записей и уведомления.</p>
    </div>
</section>

<section class="section">
    <div class="container profile-grid">
        <div>
            <?php if(session('success')): ?>
                <div class="alert alert--success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <h2 class="section__title profile-title">История записей</h2>
            <div class="profile-list">
                <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="profile-row">
                        <strong><?php echo e($appointment->service?->name ?? 'Услуга'); ?></strong>
                        <span><?php echo e($appointment->master?->name ?? 'Мастер'); ?></span>
                        <span><?php echo e($appointment->appointment_date?->format('d.m.Y')); ?> <?php echo e(substr($appointment->appointment_time, 0, 5)); ?></span>
                        <span class="status-badge status-<?php echo e($appointment->status); ?>"><?php echo e($appointment->status); ?></span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="empty-state">Записей пока нет.</p>
                <?php endif; ?>
            </div>
        </div>

        <aside class="profile-side">
            <h3>Уведомления</h3>
            <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="notification-item <?php echo e($notification->read_at ? '' : 'is-unread'); ?>">
                    <strong><?php echo e($notification->title); ?></strong>
                    <p><?php echo e($notification->message); ?></p>
                    <small><?php echo e($notification->created_at->format('d.m.Y H:i')); ?></small>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="empty-state">Новых уведомлений нет.</p>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('profile.notifications.read')); ?>">
                <?php echo csrf_field(); ?>
                <button class="btn btn--outline btn--sm" type="submit">Отметить прочитанными</button>
            </form>

            <h3>Новости и акции</h3>
            <form method="POST" action="<?php echo e(route('newsletter.store')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="name" value="<?php echo e($user->name); ?>">
                <div class="form-group">
                    <input type="email" name="email" value="<?php echo e($user->email); ?>" required>
                </div>
                <button class="btn btn--primary btn--sm" type="submit">
                    <?php echo e($subscription?->is_active ? 'Обновить подписку' : 'Подписаться'); ?>

                </button>
            </form>
        </aside>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\моя практика\Проект\resources\views/profile/index.blade.php ENDPATH**/ ?>