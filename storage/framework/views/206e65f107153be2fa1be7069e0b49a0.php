<?php $__env->startSection('title', 'Услуги — Админка'); ?>

<?php $__env->startSection('content'); ?>
<h1>Управление услугами</h1>

<section class="admin-panel">
    <h2>Добавить услугу</h2>
    <form method="POST" action="<?php echo e(route('admin.services.store')); ?>" class="admin-form-grid">
        <?php echo csrf_field(); ?>
        <input name="name" placeholder="Название" required>
        <input name="duration_minutes" type="number" placeholder="Минуты" required>
        <input name="price" type="number" step="0.01" placeholder="Цена" required>
        <input name="category" placeholder="Категория" required>
        <input name="icon" placeholder="Иконка, например men-cut.svg">
        <input name="sort_order" type="number" placeholder="Порядок" value="0">
        <textarea name="description" placeholder="Описание"></textarea>
        <label><input type="checkbox" name="is_active" value="1" checked> Активна</label>
        <button class="btn btn--primary" type="submit">Добавить</button>
    </form>
</section>

<section class="admin-panel">
    <h2>Список услуг</h2>
    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form method="POST" action="<?php echo e(route('admin.services.update', $service)); ?>" class="admin-edit-row">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input name="name" value="<?php echo e($service->name); ?>" required>
            <input name="duration_minutes" type="number" value="<?php echo e($service->duration_minutes); ?>" required>
            <input name="price" type="number" step="0.01" value="<?php echo e($service->price); ?>" required>
            <input name="category" value="<?php echo e($service->category); ?>" required>
            <input name="icon" value="<?php echo e($service->icon); ?>">
            <input name="sort_order" type="number" value="<?php echo e($service->sort_order); ?>">
            <textarea name="description"><?php echo e($service->description); ?></textarea>
            <label><input type="checkbox" name="is_active" value="1" <?php if($service->is_active): echo 'checked'; endif; ?>> Активна</label>
            <button class="btn btn--primary btn--sm" type="submit">Сохранить</button>
        </form>
        <form method="POST" action="<?php echo e(route('admin.services.delete', $service)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="admin-danger" type="submit">Удалить услугу</button>
        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\моя практика\Проект\resources\views/admin/services.blade.php ENDPATH**/ ?>