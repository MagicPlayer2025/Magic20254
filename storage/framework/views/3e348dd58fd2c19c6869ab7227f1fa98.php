<?php $__env->startSection('title', 'Отзывы — Админка'); ?>

<?php $__env->startSection('content'); ?>
<h1>Модерация отзывов</h1>

<section class="admin-panel">
    <table class="admin-table">
        <thead><tr><th>Клиент</th><th>Мастер</th><th>Оценка</th><th>Текст</th><th>Публикация</th><th></th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($review->client_name); ?></td>
                <td><?php echo e($review->master?->name); ?></td>
                <td><?php echo e($review->rating); ?></td>
                <td><?php echo e($review->text); ?></td>
                <td>
                    <form method="POST" action="<?php echo e(route('admin.reviews.update', $review)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <label><input type="checkbox" name="is_published" value="1" <?php if($review->is_published): echo 'checked'; endif; ?>> Опубликован</label>
                        <button class="btn btn--primary btn--sm" type="submit">Сохранить</button>
                    </form>
                </td>
                <td>
                    <form method="POST" action="<?php echo e(route('admin.reviews.delete', $review)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button class="admin-danger" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\marse\OneDrive\Desktop\Практика\resources\views/admin/reviews.blade.php ENDPATH**/ ?>