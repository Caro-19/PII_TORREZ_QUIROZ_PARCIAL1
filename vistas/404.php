<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/header.php';

verificarVista('404-Página no encontrada', $vistas);
?>
<section class="section">
    <div class="container">
        <h1>404 - Página no encontrada</h1>
        <p>La página que estás buscando no existe o ha sido movida.</p>
        <a href="<?php echo BASE_URL; ?>index.php" class="btn btn-accent">Volver a la página principal</a>
    </div>
</section>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>