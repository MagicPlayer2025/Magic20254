@extends('layouts.app')

@section('title', 'Запись на приём — StyleCut')

@section('content')
{{-- Hero --}}
<section class="page-hero">
    <div class="page-hero__overlay"></div>
    <div class="container page-hero__content">
        <h1>ЗАПИСЬ НА ПРИЁМ</h1>
        <p>Выберите удобное время и мастера, и мы позаботимся о вашем идеальном образе.</p>
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Главная</a> / <span>Запись</span>
        </div>
    </div>
</section>

{{-- Appointment Steps --}}
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

        @if(session('success'))
            <div class="alert alert--success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert--error">Пожалуйста, проверьте обязательные поля формы и попробуйте снова.</div>
        @endif

        <div class="appointment-content">
            <form action="{{ route('appointment.store') }}" method="POST" class="appointment-main" id="appointmentForm">
                @csrf

                <div class="appointment-panel active" id="panel-1">
                    <h2>1. Выберите услугу</h2>
                    <div class="services-select-grid">
                        @foreach($services as $service)
                        <label class="service-select-card">
                            <input type="radio" name="service_id" value="{{ $service->id }}" data-price="{{ $service->price }}" data-name="{{ $service->name }}" data-duration="{{ $service->duration_minutes }}" {{ old('service_id') == $service->id ? 'checked' : '' }}>
                            <div class="service-select-card__inner">
                                <div class="service-select-card__icon">
                                    <img src="{{ asset('images/icons/' . ($service->icon ?? 'scissors.svg')) }}" alt="">
                                </div>
                                <h3>{{ $service->name }}</h3>
                                <p>{{ $service->description }}</p>
                                <div class="service-select-card__meta">
                                    <span>{{ $service->duration_minutes }} мин.</span>
                                    <span>{{ number_format($service->price, 0, ',', ' ') }} ₽</span>
                                </div>
                            </div>
                        </label>
                        @endforeach
                    </div>
                    @error('service_id') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="appointment-panel" id="panel-2">
                    <h2>2. Выберите мастера</h2>
                    <div class="masters-select-grid">
                        @foreach($masters as $master)
                        <label class="master-select-card">
                            <input type="radio" name="master_id" value="{{ $master->id }}" data-name="{{ $master->name }}" {{ old('master_id') == $master->id ? 'checked' : '' }}>
                            <div class="master-select-card__inner">
                                <div class="master-select-card__photo">
                                    <img src="{{ asset('images/masters/' . ($master->photo ?? 'default.png')) }}" alt="{{ $master->name }}">
                                </div>
                                <h3>{{ $master->name }}</h3>
                                <p>{{ $master->position }}</p>
                                <span>Опыт: {{ $master->experience_years }} лет</span>
                            </div>
                        </label>
                        @endforeach
                    </div>
                    @error('master_id') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="appointment-panel" id="panel-3">
                    <h2>3. Выберите дату и время</h2>
                    <div class="datetime-select">
                        <div class="form-group">
                            <label>Дата</label>
                            <input type="date" name="appointment_date" id="appointmentDate" min="{{ date('Y-m-d', strtotime('+1 day')) }}" value="{{ old('appointment_date') }}">
                            @error('appointment_date') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Время</label>
                            <div class="time-slots">
                                @for($h = 10; $h <= 20; $h++)
                                <label class="time-slot">
                                    <input type="radio" name="appointment_time" value="{{ sprintf('%02d:00', $h) }}" {{ old('appointment_time') === sprintf('%02d:00', $h) ? 'checked' : '' }}>
                                    <span>{{ sprintf('%02d:00', $h) }}</span>
                                </label>
                                @endfor
                            </div>
                            @error('appointment_time') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="appointment-panel" id="panel-4">
                    <h2>4. Ваши контактные данные</h2>
                    <div class="contact-fields">
                        <div class="form-group">
                            <label>Имя*</label>
                            <input type="text" name="client_name" id="clientName" required placeholder="Ваше имя" value="{{ old('client_name') }}">
                            @error('client_name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Телефон*</label>
                            <input type="tel" name="client_phone" id="clientPhone" required placeholder="+7 (___) ___-__-__" value="{{ old('client_phone') }}">
                            @error('client_phone') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="client_email" id="clientEmail" placeholder="email@example.com" value="{{ old('client_email') }}">
                            @error('client_email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label>Комментарий</label>
                            <textarea name="comment" id="clientComment" rows="3" placeholder="Пожелания к записи">{{ old('comment') }}</textarea>
                            @error('comment') <span class="error">{{ $message }}</span> @enderror
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

{{-- Why Online Section --}}
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

{{-- CTA --}}
<section class="section section--cta">
    <div class="container">
        <h2>Готовы изменить свой стиль?</h2>
        <p>Запишитесь прямо сейчас и почувствуйте разницу!</p>
        <div class="cta__actions">
            <a href="{{ route('appointment') }}" class="btn btn--primary btn--lg">ЗАПИСАТЬСЯ</a>
            <a href="tel:+79991234567" class="btn btn--outline btn--lg">ПОЗВОНИТЬ</a>
        </div>
    </div>
</section>
@endsection
