<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';

verificarVista('403-Página Prohibida', $vistas);
?>
<section class="section">
    <div class="container">
        <h1>403 - Página Prohibida</h1>
        <p>No tiene los permisos para ingresar a la pagina.</p>
        <a href="<?php echo BASE_URL; ?>index.php" class="btn btn-accent">Volver a la página principal</a>
    </div>
</section>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>