

<?php $__env->startSection('title', 'Контакты — StyleCut'); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>КОНТАКТЫ</h1>
        <p>Мы всегда рады видеть вас в нашей парикмахерской<br>Свяжитесь с нами любым удобным способом</p>
        <div class="breadcrumb">
            <a href="<?php echo e(route('home')); ?>">Главная</a> / <span>Контакты</span>
        </div>
    </div>
</section>


<section class="section section--contact-info">
    <div class="container">
        <div class="contact-cards">
            <div class="contact-card">
                <div class="contact-card__icon">📞</div>
                <h3>Телефон</h3>
                <p>+7 (999) 123-45-67</p>
                <a href="tel:+79991234567">Позвонить</a>
            </div>
            <div class="contact-card">
                <div class="contact-card__icon">✉️</div>
                <h3>Email</h3>
                <p>info@stylecut.ru</p>
                <a href="mailto:info@stylecut.ru">Написать нам</a>
            </div>
            <div class="contact-card">
                <div class="contact-card__icon">📍</div>
                <h3>Адрес</h3>
                <p>г. Москва, ул. Примерная, 123</p>
                <a href="#">Как добраться</a>
            </div>
            <div class="contact-card">
                <div class="contact-card__icon">🕐</div>
                <h3>Режим работы</h3>
                <p>Пн - Вс: 10:00 - 21:00</p>
                <span>Без выходных</span>
            </div>
        </div>
    </div>
</section>


<section class="section section--contact-form">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-form-wrap">
                <h2>Напишите нам</h2>
                <p>Остались вопросы? Заполните форму, и мы свяжемся с вами</p>

                <?php if(session('success')): ?>
                    <div class="alert alert--success"><?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <form action="<?php echo e(route('contacts.store')); ?>" method="POST" class="contact-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Ваше имя*" required value="<?php echo e(old('name')); ?>">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" placeholder="Телефон*" required value="<?php echo e(old('phone')); ?>">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Тема обращения" value="<?php echo e(old('subject')); ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Сообщение*" rows="5" required><?php echo e(old('message')); ?></textarea>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group form-group--checkbox">
                        <label>
                            <input type="checkbox" required>
                            Я согласен на обработку персональных данных
                        </label>
                    </div>
                    <button type="submit" class="btn btn--primary">ОТПРАВИТЬ СООБЩЕНИЕ</button>
                </form>
            </div>

            <div class="contact-map-wrap">
                <h2>Мы на карте</h2>
                <div class="contact-map">
                    <div class="map-placeholder">
                        <p>Карта загружается...</p>
                        <small>г. Москва, ул. Примерная, 123</small>
                    </div>
                </div>

                <div class="how-to-get">
                    <h3>Как добраться</h3>
                    <div class="transport-item">
                        <strong>🚇 Метро</strong>
                        <p>м. Цветной бульвар — 5 минут пешком<br>м. Трубная — 7 минут пешком</p>
                    </div>
                    <div class="transport-item">
                        <strong>🚌 Автобус</strong>
                        <p>Остановка «Цветной бульвар» — 2 минуты<br>Автобусы: 24, 38, 101, 124</p>
                    </div>
                    <div class="transport-item">
                        <strong>🚗 На автомобиле</strong>
                        <p>Удобная парковка рядом с салоном</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section section--call-cta">
    <div class="container">
        <div class="call-cta">
            <div class="call-cta__text">
                <h2>Есть вопросы? Позвоните нам!</h2>
                <p>Наш администратор ответит на все ваши вопросы и поможет с записью</p>
            </div>
            <a href="tel:+79991234567" class="call-cta__phone">
                <span>+7 (999) 123-45-67</span>
                <small>звонок бесплатный</small>
            </a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\моя практика\Проект\resources\views/pages/contacts.blade.php ENDPATH**/ ?>