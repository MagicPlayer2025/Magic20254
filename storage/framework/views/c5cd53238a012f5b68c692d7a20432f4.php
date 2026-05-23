<?php $__env->startSection('title', 'Запись на приём — StyleCut'); ?>

<?php $__env->startSection('content'); ?>

<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>ЗАПИСЬ НА ПРИЁМ</h1>
        <p>Выберите удобное время и мастера, и мы позаботимся о вашем идеальном образе.</p>
        <div class="breadcrumb">
            <a href="<?php echo e(route('home')); ?>">Главная</a> / <span>Запись</span>
        </div>
    </div>
</section>


<section class="section section--appointment">
    <div class="container">
        <div class="appointment-steps">
            <div class="step active" data-step="1">
                <span class="step__number">1</span>
                <span class="step__title">Услуга</span>
                <span class="step__desc">Выбор услуги</span>
            </div>
            <div class="step" data-step="2">
                <span class="step__number">2</span>
                <span class="step__title">Мастер</span>
                <span class="step__desc">Выбор мастера</span>
            </div>
            <div class="step" data-step="3">
                <span class="step__number">3</span>
                <span class="step__title">Дата и время</span>
                <span class="step__desc">Выбор даты и времени</span>
            </div>
            <div class="step" data-step="4">
                <span class="step__number">4</span>
                <span class="step__title">Контакты</span>
                <span class="step__desc">Ваши данные</span>
            </div>
            <div class="step" data-step="5">
                <span class="step__number">5</span>
                <span class="step__title">Подтверждение</span>
                <span class="step__desc">Проверьте и подтвердите</span>
            </div>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert--success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="alert alert--error">Пожалуйста, проверьте обязательные поля формы и попробуйте снова.</div>
        <?php endif; ?>

        <div class="appointment-content">
            <form action="<?php echo e(route('appointment.store')); ?>" method="POST" class="appointment-main" id="appointmentForm">
                <?php echo csrf_field(); ?>

                <div class="appointment-panel active" id="panel-1">
                    <h2>1. Выберите услугу</h2>
                    <div class="services-select-grid">
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="service-select-card">
                            <input type="radio" name="service_id" value="<?php echo e($service->id); ?>" data-price="<?php echo e($service->price); ?>" data-name="<?php echo e($service->name); ?>" data-duration="<?php echo e($service->duration_minutes); ?>" <?php echo e(old('service_id') == $service->id ? 'checked' : ''); ?>>
                            <div class="service-select-card__inner">
                                <div class="service-select-card__icon">
                                    <img src="<?php echo e(asset('images/icons/' . ($service->icon ?? 'scissors.svg'))); ?>" alt="">
                                </div>
                                <h3><?php echo e($service->name); ?></h3>
                                <p><?php echo e($service->description); ?></p>
                                <div class="service-select-card__meta">
                                    <span><?php echo e($service->duration_minutes); ?> мин.</span>
                                    <span><?php echo e(number_format($service->price, 0, ',', ' ')); ?> ₽</span>
                                </div>
                            </div>
                        </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php $__errorArgs = ['service_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="appointment-panel" id="panel-2">
                    <h2>2. Выберите мастера</h2>
                    <div class="masters-select-grid">
                        <?php $__currentLoopData = $masters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $master): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="master-select-card">
                            <input type="radio" name="master_id" value="<?php echo e($master->id); ?>" data-name="<?php echo e($master->name); ?>" <?php echo e(old('master_id') == $master->id ? 'checked' : ''); ?>>
                            <div class="master-select-card__inner">
                                <div class="master-select-card__photo">
                                    <img src="<?php echo e(asset('images/masters/' . ($master->photo ?? 'default.png'))); ?>" alt="<?php echo e($master->name); ?>">
                                </div>
                                <h3><?php echo e($master->name); ?></h3>
                                <p><?php echo e($master->position); ?></p>
                                <span>Опыт: <?php echo e($master->experience_years); ?> лет</span>
                            </div>
                        </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php $__errorArgs = ['master_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="appointment-panel" id="panel-3">
                    <h2>3. Выберите дату и время</h2>
                    <div class="datetime-select">
                        <div class="form-group">
                            <label>Дата</label>
                            <input type="date" name="appointment_date" id="appointmentDate" min="<?php echo e(date('Y-m-d', strtotime('+1 day'))); ?>" value="<?php echo e(old('appointment_date')); ?>">
                            <?php $__errorArgs = ['appointment_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label>Время</label>
                            <div class="time-slots">
                                <?php for($h = 10; $h <= 20; $h++): ?>
                                <label class="time-slot">
                                    <input type="radio" name="appointment_time" value="<?php echo e(sprintf('%02d:00', $h)); ?>" <?php echo e(old('appointment_time') === sprintf('%02d:00', $h) ? 'checked' : ''); ?>>
                                    <span><?php echo e(sprintf('%02d:00', $h)); ?></span>
                                </label>
                                <?php endfor; ?>
                            </div>
                            <?php $__errorArgs = ['appointment_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <div class="appointment-panel" id="panel-4">
                    <h2>4. Ваши контактные данные</h2>
                    <div class="contact-fields">
                        <div class="form-group">
                            <label>Имя*</label>
                            <input type="text" name="client_name" id="clientName" required placeholder="Ваше имя" value="<?php echo e(old('client_name')); ?>">
                            <?php $__errorArgs = ['client_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label>Телефон*</label>
                            <input type="tel" name="client_phone" id="clientPhone" required placeholder="+7 (___) ___-__-__" value="<?php echo e(old('client_phone')); ?>">
                            <?php $__errorArgs = ['client_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="client_email" id="clientEmail" placeholder="email@example.com" value="<?php echo e(old('client_email')); ?>">
                            <?php $__errorArgs = ['client_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label>Комментарий</label>
                            <textarea name="comment" id="clientComment" rows="3" placeholder="Пожелания к записи"><?php echo e(old('comment')); ?></textarea>
                            <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <div class="appointment-panel" id="panel-5">
                    <h2>5. Подтверждение записи</h2>
                    <div class="confirmation-details">
                        <p>Проверьте данные и подтвердите запись</p>
                        <div id="confirmationSummary"></div>
                    </div>
                </div>

                <div class="appointment-nav">
                    <button type="button" class="btn btn--outline" id="prevStep" style="display:none;">Назад</button>
                    <button type="button" class="btn btn--primary" id="nextStep">Далее</button>
                </div>
            </form>

            <aside class="appointment-sidebar">
                <h3>Ваша запись</h3>
                <div class="sidebar-summary">
                    <div class="summary-row">
                        <span>Услуга</span>
                        <span id="summaryService">Не выбрана</span>
                    </div>
                    <div class="summary-row">
                        <span>Мастер</span>
                        <span id="summaryMaster">Не выбран</span>
                    </div>
                    <div class="summary-row">
                        <span>Дата и время</span>
                        <span id="summaryDateTime">Не выбрано</span>
                    </div>
                    <hr>
                    <div class="summary-row summary-row--total">
                        <span>Итого</span>
                        <span id="summaryPrice">0 ₽</span>
                    </div>
                </div>
                <div class="sidebar-info">
                    <p>Онлайн-запись доступна круглосуточно. Мы свяжемся с вами для подтверждения.</p>
                </div>
                <div class="sidebar-help">
                    <h4>Нужна помощь?</h4>
                    <p>Позвоните нам, и администратор поможет с выбором услуги и времени.</p>
                    <a href="tel:+79991234567" class="sidebar-phone">📞 +7 (999) 123-45-67</a>
                </div>
            </aside>
        </div>
    </div>
</section>


<section class="section section--why">
    <div class="container">
        <h2 class="section__title">Почему удобно записываться онлайн?</h2>
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-card__icon">⏰</div>
                <h3>Экономия времени</h3>
                <p>Записывайтесь в любое удобное время, не выходя из дома.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-card__icon">👤</div>
                <h3>Выбор мастера и времени</h3>
                <p>Вы сами выбираете мастера и удобное время для посещения.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-card__icon">🔔</div>
                <h3>Напоминания</h3>
                <p>Мы напомним вам о записи за день до визита.</p>
            </div>
            <div class="benefit-card">
                <div class="benefit-card__icon">⭐</div>
                <h3>Гарантия качества</h3>
                <p>Мы ценим каждого клиента и гарантируем отличный результат.</p>
            </div>
        </div>
    </div>
</section>


<section class="section section--cta">
    <div class="container">
        <h2>Готовы изменить свой стиль?</h2>
        <p>Запишитесь прямо сейчас и почувствуйте разницу!</p>
        <div class="cta__actions">
            <a href="<?php echo e(route('appointment')); ?>" class="btn btn--primary btn--lg">ЗАПИСАТЬСЯ</a>
            <a href="tel:+79991234567" class="btn btn--outline btn--lg">ПОЗВОНИТЬ</a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\моя практика\Проект\resources\views/pages/appointment.blade.php ENDPATH**/ ?>