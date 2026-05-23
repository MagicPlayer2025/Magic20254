<?php $__env->startSection('title', 'Регистрация — StyleCut'); ?>

<?php $__env->startSection('content'); ?>
<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>Регистрация</h1>
        <p>Создайте личный кабинет для записей и уведомлений.</p>
    </div>
</section>

<section class="section">
    <div class="container auth-wrap">
        <form method="POST" action="<?php echo e(route('register.store')); ?>" class="auth-card">
            <?php echo csrf_field(); ?>
            <?php if($errors->any()): ?>
                <div class="alert alert--error"><?php echo e($errors->first()); ?></div>
            <?php endif; ?>
            <div class="form-group">
                <label>Имя</label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>
            <div class="form-group">
                <label>Телефон</label>
                <input type="tel" name="phone" value="<?php echo e(old('phone')); ?>">
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label>Повтор пароля</label>
                    <input type="password" name="password_confirmation" required>
                </div>
            </div>
            <button class="btn btn--primary" type="submit">Создать аккаунт</button>
            <p class="auth-note">Уже есть аккаунт? <a href="<?php echo e(route('login')); ?>">Войти</a></p>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\моя практика\Проект\resources\views/auth/register.blade.php ENDPATH**/ ?>