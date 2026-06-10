<?php
require_once __DIR__ . '/../includes/adopcion.php';
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
            <p>Tu solicitud para adoptar a <strong><?= htmlspecialchars($adopcion->getIdAnimal()->getNombre()) ?></strong> fue registrada con éxito.</p>
        </div>
    </div>

    <h3><i class="fa-solid fa-list-check"></i> Resumen de la solicitud</h3>

    <div class="resumen-grid">
        <div class="resumen-item">
            <span class="resumen-label"><i class="fa-solid fa-paw"></i> Animal</span>
            <span><?= htmlspecialchars($adopcion->getIdAnimal()->getNombre()) ?>
                <?php if ($adopcion->getIdAnimal()->getImagen()): ?>
                    — <?= htmlspecialchars($adopcion->getIdAnimal()->getEspecie()) ?>
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
        <a class="btn" href="index.php?s=adopcion">
            <i class="fa-solid fa-arrow-left"></i> Ver más animales
        </a>
        <a class="btn btn-accent" href="index.php?s=inicio">
            <i class="fa-solid fa-house"></i> Volver al inicio
        </a>
    </div>

</section>