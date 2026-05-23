<?php $__env->startSection('title', 'Вход — StyleCut'); ?>

<?php $__env->startSection('content'); ?>
<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>Вход</h1>
        <p>Войдите, чтобы видеть историю записей и уведомления.</p>
    </div>
</section>

<section class="section">
    <div class="container auth-wrap">
        <form method="POST" action="<?php echo e(route('login.store')); ?>" class="auth-card">
            <?php echo csrf_field(); ?>
            <?php if($errors->any()): ?>
                <div class="alert alert--error"><?php echo e($errors->first()); ?></div>
            <?php endif; ?>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?php echo e(old('email')); ?>" required>
            </div>
            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group form-group--checkbox">
                <label><input type="checkbox" name="remember" value="1"> Запомнить меня</label>
            </div>
            <button class="btn btn--primary" type="submit">Войти</button>
            <p class="auth-note">Нет аккаунта? <a href="<?php echo e(route('register')); ?>">Зарегистрироваться</a></p>
            <p class="auth-note">Админ: admin@stylecut.local / admin123</p>
        </form>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\marse\OneDrive\Desktop\Практика\resources\views/auth/login.blade.php ENDPATH**/ ?>