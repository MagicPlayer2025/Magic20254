<?php $__env->startSection('title', 'Контакты — Админка'); ?>

<?php $__env->startSection('content'); ?>
<h1>Контакты и обращения</h1>

<section class="admin-panel">
    <h2>Контактная информация</h2>
    <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>" class="admin-form-grid">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <input name="phone" value="<?php echo e($settings['phone'] ?? ''); ?>" placeholder="Телефон для кнопки Позвонить" required>
        <input name="email" value="<?php echo e($settings['email'] ?? ''); ?>" placeholder="Email">
        <input name="address" value="<?php echo e($settings['address'] ?? ''); ?>" placeholder="Адрес">
        <button class="btn btn--primary" type="submit">Сохранить</button>
    </form>
</section>

<section class="admin-panel">
    <h2>Обращения с формы</h2>
    <table class="admin-table">
        <thead><tr><th>Имя</th><th>Контакты</th><th>Тема</th><th>Сообщение</th><th>Дата</th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($contact->name); ?></td>
                <td><?php echo e($contact->phone); ?><br><?php echo e($contact->email); ?></td>
                <td><?php echo e($contact->subject); ?></td>
                <td><?php echo e($contact->message); ?></td>
                <td><?php echo e($contact->created_at->format('d.m.Y H:i')); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\моя практика\Проект\resources\views/admin/contacts.blade.php ENDPATH**/ ?>