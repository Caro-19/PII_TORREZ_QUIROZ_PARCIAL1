<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/animales.php';

$id         = (int)($_GET['animal'] ?? 0);
$animal       = $animales[$id] ?? null;
if (!$animal) {
    header('Location: ' . BASE_URL . 'vistas/404.php');
    exit;
};
$nombreAnimal = $animal ? $animal->getNombre() : ucfirst($id);
$backLink     = $animal ? 'perfil_x_animal.php?animal=' . urlencode($id) : 'adopcion.php';

require_once __DIR__ . '/../includes/header.php';

verificarVista('Adoptar', $vistas);
?>

<div class="page-header page-header-sm">
    <a href="<?= $backLink ?>" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> Volver al perfil
    </a>
</div>

<div class="form-page">
    <div class="form-page-intro">
        <h2>Adoptá a <?= htmlspecialchars($nombreAnimal) ?></h2>
        <p>Completá el formulario y nos pondremos en contacto a la brevedad para continuar el proceso.</p>

        <?php if ($animal && $animal->getImagen()): ?>
            <div class="form-animal-preview">
                <img src="<?= htmlspecialchars($animal->getImagen()) ?>" alt="<?= htmlspecialchars($nombreAnimal) ?>">
                <div>
                    <strong><?= htmlspecialchars($animal->getNombre()) ?></strong>
                    <span><?= htmlspecialchars($animal->getRaza()) ?> · <?= htmlspecialchars($animal->getEdad()) ?> año<?= $animal->getEdad() != 1 ? 's' : '' ?></span>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <form action="procesar_adopcion.php" method="POST" data-validate novalidate>

        <input type="hidden" name="animal" value="<?= htmlspecialchars($id) ?>">

        <div class="form-group">
            <label for="nombre">
                <i class="fa-solid fa-user"></i> Nombre completo
            </label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                placeholder="Tu nombre y apellido"
                autocomplete="name"
                required>
            <p class="form-error" role="alert"></p>
        </div>

        <div class="form-group">
            <label for="email">
                <i class="fa-solid fa-envelope"></i> Correo electrónico
            </label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="tu@email.com"
                autocomplete="email"
                required>
            <p class="form-error" role="alert"></p>
        </div>

        <div class="form-group">
            <label for="telefono">
                <i class="fa-solid fa-phone"></i> Teléfono <span class="label-optional">(opcional)</span>
            </label>
            <input
                type="tel"
                id="telefono"
                name="telefono"
                placeholder="+54 9 11 0000-0000"
                autocomplete="tel">
            <p class="form-error" role="alert"></p>
        </div>

        <div class="form-group">
            <label for="motivo">
                <i class="fa-solid fa-comment-dots"></i> ¿Por qué querés adoptar a <?= htmlspecialchars($nombreAnimal) ?>?
            </label>
            <textarea
                id="motivo"
                name="motivo"
                rows="5"
                placeholder="Contanos sobre tu hogar, tu rutina y por qué serías la persona ideal..."
                required></textarea>
            <p class="char-counter" aria-live="polite">0 / 30 caracteres mínimos</p>
            <p class="form-error" role="alert"></p>
        </div>

        <button type="submit" class="btn btn-accent btn-lg btn-block">
            <i class="fa-solid fa-paper-plane"></i> Enviar solicitud
        </button>

    </form>
</div>

<script src="<?php echo BASE_URL; ?>js/validacion.js"></script>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>