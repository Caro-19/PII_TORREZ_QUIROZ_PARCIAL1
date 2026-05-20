'use strict';

document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form[data-validate]');
    if (!form) return;

    /* ── Reglas de validación ────────────────────────── */
    const rules = {
        nombre: {
            test: v => v.trim().length >= 2 && /^[a-záéíóúüñA-ZÁÉÍÓÚÜÑ\s''-]+$/.test(v.trim()),
            msg:  'Ingresá tu nombre completo (solo letras, mínimo 2 caracteres).'
        },
        email: {
            test: v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()),
            msg:  'Ingresá un correo electrónico válido.'
        },
        telefono: {
            test: v => v.trim() === '' || /^[\d\s+\-().]{6,20}$/.test(v.trim()),
            msg:  'Formato de teléfono inválido. Ejemplo: +54 9 11 0000-0000'
        },
        motivo: {
            test: v => v.trim().length >= 30,
            msg:  () => {
                const len = form.querySelector('[name="motivo"]').value.trim().length;
                return `Contanos un poco más (${len}/30 caracteres mínimos).`;
            }
        }
    };

    /* ── Helpers DOM ─────────────────────────────────── */
    function getGroup(input)  { return input.closest('.form-group'); }
    function getError(input)  { return getGroup(input).querySelector('.form-error'); }
    function getCounter(input){ return getGroup(input).querySelector('.char-counter'); }

    function markValid(input) {
        input.classList.remove('is-invalid');
        input.classList.add('is-valid');
        const err = getError(input);
        if (err) { err.textContent = ''; err.hidden = true; }
    }

    function markInvalid(input, msg) {
        input.classList.add('is-invalid');
        input.classList.remove('is-valid');
        const err = getError(input);
        if (err) {
            err.textContent = typeof msg === 'function' ? msg() : msg;
            err.hidden = false;
        }
    }

    function validateField(input) {
        const name = input.name;
        const rule = rules[name];
        if (!rule) return true;

        if (rule.test(input.value)) {
            markValid(input);
            return true;
        } else {
            markInvalid(input, rule.msg);
            return false;
        }
    }

    /* ── Contador de caracteres (motivo) ─────────────── */
    const motivoInput = form.querySelector('[name="motivo"]');
    if (motivoInput) {
        motivoInput.addEventListener('input', () => {
            const len     = motivoInput.value.trim().length;
            const counter = getCounter(motivoInput);
            if (counter) {
                counter.textContent = `${len} / 30 caracteres mínimos`;
                counter.classList.toggle('counter-ok', len >= 30);
            }
            if (motivoInput.classList.contains('is-invalid')) {
                validateField(motivoInput);
            }
        });
    }

    /* ── Validación en tiempo real (blur + live fix) ─── */
    form.querySelectorAll('input:not([type=hidden]), textarea').forEach(input => {
        input.addEventListener('blur', () => validateField(input));

        input.addEventListener('input', () => {
            if (input.classList.contains('is-invalid')) {
                validateField(input);
            }
        });
    });

    /* ── Validación al enviar ────────────────────────── */
    form.addEventListener('submit', e => {
        let allValid = true;

        form.querySelectorAll('input:not([type=hidden]), textarea').forEach(input => {
            if (!validateField(input)) allValid = false;
        });

        if (!allValid) {
            e.preventDefault();

            // Foco en el primer campo inválido
            const first = form.querySelector('.is-invalid');
            if (first) {
                first.focus();
                first.closest('.form-group').scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

            // Animación shake en el formulario
            form.classList.remove('shake');
            void form.offsetWidth; // reflow para reiniciar la animación
            form.classList.add('shake');
            form.addEventListener('animationend', () => form.classList.remove('shake'), { once: true });
        }
    });
});
