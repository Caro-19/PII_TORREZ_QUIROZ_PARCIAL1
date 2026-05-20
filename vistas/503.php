<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';

verificarVista('503-Servicio No Disponible', $vistas);
?>
<section class="section">
    <div class="container">
        <h1>503 - Servicio No Disponible</h1>
        <p>El servicio al que intenta acceder no está disponible en este momento.</p>
        <a href="<?php echo BASE_URL; ?>index.php" class="btn btn-accent">Volver a la página principal</a>
    </div>
</section>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>