// Al cambiar el radio de tipoMascota, filtrás los checkboxes
document.querySelectorAll('input[name="tipoMascota"]').forEach(radio => {
    radio.addEventListener('change', function () {
        const seleccion = this.value;

        document.querySelectorAll('input[name="razas[]"]').forEach(checkbox => {
            const item = checkbox.closest('.checkbox-item');
            const especie = checkbox.dataset.especie;

            if (seleccion === 'Ambos' || especie === seleccion) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
                checkbox.checked = false;
            }
        });
    });
});