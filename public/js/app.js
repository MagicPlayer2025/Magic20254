document.addEventListener('DOMContentLoaded', function() {
    const burger = document.querySelector('.header__burger');
    const nav = document.querySelector('.header__nav');

    if (burger && nav) {
        burger.addEventListener('click', function() {
            nav.classList.toggle('open');
            burger.classList.toggle('active');
        });
    }

    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(item => item.classList.remove('active'));
            this.classList.add('active');

            const filter = this.dataset.filter;
            galleryItems.forEach(item => {
                item.style.display = filter === 'all' || item.dataset.category === filter ? '' : 'none';
            });
        });
    });

    const appointmentForm = document.getElementById('appointmentForm');
    const panels = document.querySelectorAll('.appointment-panel');
    const steps = document.querySelectorAll('.step');
    const nextBtn = document.getElementById('nextStep');
    const prevBtn = document.getElementById('prevStep');

    if (appointmentForm && panels.length && steps.length && nextBtn && prevBtn) {
        let currentStep = 1;
        const summaryService = document.getElementById('summaryService');
        const summaryMaster = document.getElementById('summaryMaster');
        const summaryDateTime = document.getElementById('summaryDateTime');
        const summaryPrice = document.getElementById('summaryPrice');
        const confirmationSummary = document.getElementById('confirmationSummary');

        function showStep(step) {
            panels.forEach(panel => panel.classList.remove('active'));
            steps.forEach(item => item.classList.remove('active'));

            const panel = document.getElementById(`panel-${step}`);
            if (panel) {
                panel.classList.add('active');
            }

            steps.forEach(item => {
                if (parseInt(item.dataset.step, 10) <= step) {
                    item.classList.add('active');
                }
            });

            prevBtn.style.display = step > 1 ? '' : 'none';
            nextBtn.textContent = step === 5 ? 'Подтвердить запись' : 'Далее';
        }

        function updateSummary() {
            const serviceRadio = document.querySelector('input[name="service_id"]:checked');
            const masterRadio = document.querySelector('input[name="master_id"]:checked');
            const dateInput = document.querySelector('input[name="appointment_date"]');
            const timeRadio = document.querySelector('input[name="appointment_time"]:checked');
            const clientName = document.getElementById('clientName');
            const clientPhone = document.getElementById('clientPhone');

            const serviceText = serviceRadio ? serviceRadio.dataset.name : 'Не выбрана';
            const masterText = masterRadio ? masterRadio.dataset.name : 'Не выбран';
            const priceText = serviceRadio ? `${Number(serviceRadio.dataset.price).toLocaleString('ru-RU')} ₽` : '0 ₽';

            let dateTimeText = 'Не выбрано';
            if (dateInput && dateInput.value && timeRadio) {
                dateTimeText = `${dateInput.value} ${timeRadio.value}`;
            } else if (dateInput && dateInput.value) {
                dateTimeText = dateInput.value;
            }

            summaryService.textContent = serviceText;
            summaryMaster.textContent = masterText;
            summaryDateTime.textContent = dateTimeText;
            summaryPrice.textContent = priceText;

            if (confirmationSummary) {
                confirmationSummary.innerHTML = `
                    <div class="confirmation-summary__row"><span>Услуга</span><strong>${serviceText}</strong></div>
                    <div class="confirmation-summary__row"><span>Мастер</span><strong>${masterText}</strong></div>
                    <div class="confirmation-summary__row"><span>Дата и время</span><strong>${dateTimeText}</strong></div>
                    <div class="confirmation-summary__row"><span>Клиент</span><strong>${clientName && clientName.value ? clientName.value : 'Не указан'}</strong></div>
                    <div class="confirmation-summary__row"><span>Телефон</span><strong>${clientPhone && clientPhone.value ? clientPhone.value : 'Не указан'}</strong></div>
                    <div class="confirmation-summary__row"><span>Стоимость</span><strong>${priceText}</strong></div>
                `;
            }
        }

        function validateCurrentStep(step) {
            if (step === 1 && !document.querySelector('input[name="service_id"]:checked')) {
                alert('Выберите услугу, чтобы продолжить.');
                return false;
            }

            if (step === 2 && !document.querySelector('input[name="master_id"]:checked')) {
                alert('Выберите мастера, чтобы продолжить.');
                return false;
            }

            if (step === 3) {
                const dateInput = document.querySelector('input[name="appointment_date"]');
                const timeRadio = document.querySelector('input[name="appointment_time"]:checked');

                if (!dateInput || !dateInput.value || !timeRadio) {
                    alert('Укажите дату и время записи.');
                    return false;
                }
            }

            if (step === 4) {
                const clientName = document.getElementById('clientName');
                const clientPhone = document.getElementById('clientPhone');

                if (!clientName || !clientName.value.trim() || !clientPhone || !clientPhone.value.trim()) {
                    alert('Заполните имя и телефон.');
                    return false;
                }
            }

            return true;
        }

        nextBtn.addEventListener('click', function() {
            if (!validateCurrentStep(currentStep)) {
                return;
            }

            if (currentStep < 5) {
                currentStep += 1;
                updateSummary();
                showStep(currentStep);
                return;
            }

            appointmentForm.requestSubmit();
        });

        prevBtn.addEventListener('click', function() {
            if (currentStep > 1) {
                currentStep -= 1;
                showStep(currentStep);
            }
        });

        document.querySelectorAll('input[name="service_id"], input[name="master_id"], input[name="appointment_time"], #clientName, #clientPhone, #clientEmail, #clientComment').forEach(input => {
            input.addEventListener('change', updateSummary);
            input.addEventListener('input', updateSummary);
        });

        const dateInput = document.querySelector('input[name="appointment_date"]');
        if (dateInput) {
            dateInput.addEventListener('change', updateSummary);
        }

        if (
            document.querySelector('input[name="service_id"]:checked') ||
            document.querySelector('input[name="master_id"]:checked') ||
            (dateInput && dateInput.value) ||
            document.getElementById('clientName')?.value ||
            document.getElementById('clientPhone')?.value
        ) {
            currentStep = 4;
        }

        updateSummary();
        showStep(currentStep);
    }

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});
