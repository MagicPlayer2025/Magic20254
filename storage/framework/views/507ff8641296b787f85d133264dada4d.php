<?php $__env->startSection('title', 'Записи — Админка'); ?>

<?php $__env->startSection('content'); ?>
<h1>Управление записями</h1>

<section class="admin-panel">
    <table class="admin-table">
        <thead><tr><th>Клиент</th><th>Контакты</th><th>Услуга</th><th>Мастер</th><th>Дата и статус</th><th></th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($appointment->client_name); ?><br><small><?php echo e($appointment->user?->email); ?></small></td>
                <td><?php echo e($appointment->client_phone); ?><br><?php echo e($appointment->client_email); ?></td>
                <td><?php echo e($appointment->service?->name); ?></td>
                <td><?php echo e($appointment->master?->name); ?></td>
                <td>
                    <form method="POST" action="<?php echo e(route('admin.appointments.update', $appointment)); ?>" class="admin-inline-form">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <input type="date" name="appointment_date" value="<?php echo e($appointment->appointment_date?->format('Y-m-d')); ?>" required>
                        <input type="time" name="appointment_time" value="<?php echo e(substr($appointment->appointment_time, 0, 5)); ?>" required>
                        <select name="status">
                            <?php $__currentLoopData = ['pending', 'confirmed', 'completed', 'cancelled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($status); ?>" <?php if($appointment->status === $status): echo 'selected'; endif; ?>><?php echo e($status); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button class="btn btn--primary btn--sm" type="submit">Обновить</button>
                    </form>
                </td>
                <td><?php echo e(number_format($appointment->total_price, 0, ',', ' ')); ?> ₽</td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\marse\OneDrive\Desktop\Практика\resources\views/admin/appointments.blade.php ENDPATH**/ ?>