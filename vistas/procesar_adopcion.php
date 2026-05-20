<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../clases/Adopcion.php';
require_once __DIR__ . '/../includes/animales.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: adopcion.php');
    exit;
}

$id = (int)($_POST['animal'] ?? 0);

if (!isset($animales[$id])) {
    header('Location: adoptar.php?error=animal_no_existe');
    exit;
}

//Validacion antes de crear el objeto de adopcion
$errores = [];
$nombre   = trim($_POST['nombre']   ?? '');
$email    = trim($_POST['email']    ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$motivo   = trim($_POST['motivo']   ?? '');

if (strlen($nombre) < 2 || !preg_match('/^[\p{L}\s\'\-]+$/u', $nombre)) {
    $errores[] = 'Nombre inválido.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = 'Email inválido.';
}
if ($telefono !== '' && !preg_match('/^[\d\s+\-().]{6,20}$/', $telefono)) {
    $errores[] = 'Teléfono inválido.';
}
if (strlen($motivo) < 30) {
    $errores[] = 'El motivo debe tener al menos 30 caracteres.';
}

if (!empty($errores)) {
    header('Location: adoptar.php?animal=' . $id . '&error=' . urlencode(implode(' | ', $errores)));
    exit;
}

//Crea el objeto luego de validar los datos.
$animalObj = $animales[$id];
$adopcion = new Adopcion($animalObj, $nombre, $email, $telefono, $motivo);

require_once __DIR__ . '/../includes/header.php';
?>

<div class="page-header">
    <h2><i class="fa-solid fa-circle-check"></i> ¡Solicitud enviada!</h2>
    <p>Nos pondremos en contacto a la brevedad para continuar el proceso</p>
</div>

<section class="perfil">

    <div class="success-banner">
        <i class="fa-solid fa-heart-pulse"></i>
        <div>
            <strong>Gracias, <?= htmlspecialchars($adopcion->getNombreAdoptante()) ?>.</strong>
            <p>Tu solicitud para adoptar a <strong><?= htmlspecialchars($adopcion->getAnimal()->getNombre()) ?></strong> fue registrada con éxito.</p>
        </div>
    </div>

    <h3><i class="fa-solid fa-list-check"></i> Resumen de la solicitud</h3>

    <div class="resumen-grid">
        <div class="resumen-item">
            <span class="resumen-label"><i class="fa-solid fa-paw"></i> Animal</span>
            <span><?= htmlspecialchars($adopcion->getAnimal()->getNombre()) ?>
                <?php if ($adopcion->getAnimal()->getImagen()): ?>
                    — <?= htmlspecialchars($adopcion->getAnimal()->getRaza()) ?>
                <?php endif; ?>
            </span>
        </div>
        <div class="resumen-item">
            <span class="resumen-label"><i class="fa-solid fa-user"></i> Adoptante</span>
            <span><?= htmlspecialchars($adopcion->getNombreAdoptante()) ?></span>
        </div>
        <div class="resumen-item">
            <span class="resumen-label"><i class="fa-solid fa-envelope"></i> Email</span>
            <span><?= htmlspecialchars($adopcion->getEmail()) ?></span>
        </div>
        <div class="resumen-item">
            <span class="resumen-label"><i class="fa-solid fa-phone"></i> Teléfono</span>
            <span><?= htmlspecialchars($adopcion->getTelefono()) ?: '<em class="text-muted">No proporcionado</em>' ?></span>
        </div>
        <div class="resumen-item resumen-full">
            <span class="resumen-label"><i class="fa-solid fa-comment-dots"></i> Motivo</span>
            <span><?= $adopcion->getMotivo() ? nl2br(htmlspecialchars($adopcion->getMotivo())) : '<em class="text-muted">No proporcionado</em>' ?></span>
        </div>
    </div>

    <div class="perfil-cta">
        <a class="btn" href="<?php echo BASE_URL; ?>vistas/adopcion.php">
            <i class="fa-solid fa-arrow-left"></i> Ver más animales
        </a>
        <a class="btn btn-accent" href="<?php echo BASE_URL; ?>index.php">
            <i class="fa-solid fa-house"></i> Volver al inicio
        </a>
    </div>

</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>