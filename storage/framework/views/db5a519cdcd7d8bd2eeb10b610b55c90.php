<?php $__env->startSection('title', 'Панель управления — StyleCut'); ?>

<?php $__env->startSection('content'); ?>
<h1>Панель управления</h1>

<div class="admin-stats">
    <div><strong><?php echo e($stats['users']); ?></strong><span>Пользователи</span></div>
    <div><strong><?php echo e($stats['appointments']); ?></strong><span>Записи</span></div>
    <div><strong><?php echo e($stats['pendingAppointments']); ?></strong><span>Ожидают</span></div>
    <div><strong><?php echo e($stats['visits']); ?></strong><span>Посещения</span></div>
    <div><strong><?php echo e($stats['subscriptions']); ?></strong><span>Подписки</span></div>
</div>

<div class="admin-grid">
    <section class="admin-panel">
        <h2>Загрузка мастеров</h2>
        <?php $__currentLoopData = $masterLoad; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="admin-line">
                <span><?php echo e($master->name); ?></span>
                <strong><?php echo e($master->appointments_count); ?></strong>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>

    <section class="admin-panel">
        <h2>Популярные страницы</h2>
        <?php $__currentLoopData = $popularPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="admin-line">
                <span><?php echo e($page->path); ?></span>
                <strong><?php echo e($page->total); ?></strong>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
</div>

<section class="admin-panel">
    <h2>Последние записи</h2>
    <table class="admin-table">
        <thead><tr><th>Клиент</th><th>Услуга</th><th>Мастер</th><th>Дата</th><th>Статус</th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $recentAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($appointment->client_name); ?></td>
                <td><?php echo e($appointment->service?->name); ?></td>
                <td><?php echo e($appointment->master?->name); ?></td>
                <td><?php echo e($appointment->appointment_date?->format('d.m.Y')); ?> <?php echo e(substr($appointment->appointment_time, 0, 5)); ?></td>
                <td><?php echo e($appointment->status); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\marse\OneDrive\Desktop\Практика\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>