<?php $__env->startSection('title', 'Галерея — Админка'); ?>

<?php $__env->startSection('content'); ?>
<h1>Управление галереей</h1>

<section class="admin-panel">
    <h2>Добавить фото</h2>
    <form method="POST" action="<?php echo e(route('admin.gallery.store')); ?>" class="admin-form-grid" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input name="title" placeholder="Название">
        <input name="image" placeholder="gallery/work-16.png">
        <input name="image_file" type="file" accept="image/*">
        <input name="category" placeholder="men, women, coloring, beard, interior" required>
        <input name="sort_order" type="number" value="0">
        <label><input type="checkbox" name="is_active" value="1" checked> Активно</label>
        <button class="btn btn--primary" type="submit">Добавить</button>
    </form>
</section>

<section class="admin-panel gallery-admin-grid">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="admin-gallery-item">
            <img src="<?php echo e(asset('images/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>">
            <form method="POST" action="<?php echo e(route('admin.gallery.update', $item)); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input name="title" value="<?php echo e($item->title); ?>">
                <input name="image" value="<?php echo e($item->image); ?>" required>
                <input name="image_file" type="file" accept="image/*">
                <input name="category" value="<?php echo e($item->category); ?>" required>
                <input name="sort_order" type="number" value="<?php echo e($item->sort_order); ?>">
                <label><input type="checkbox" name="is_active" value="1" <?php if($item->is_active): echo 'checked'; endif; ?>> Активно</label>
                <button class="btn btn--primary btn--sm" type="submit">Сохранить</button>
            </form>
            <form method="POST" action="<?php echo e(route('admin.gallery.delete', $item)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="admin-danger" type="submit">Удалить</button>
            </form>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\моя практика\Проект\resources\views/admin/gallery.blade.php ENDPATH**/ ?>