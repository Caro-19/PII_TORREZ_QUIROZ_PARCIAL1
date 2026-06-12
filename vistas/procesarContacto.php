<?php 
require_once __DIR__ . '/../includes/contacto.php';

?>

<div class="page-header">
    <h2><i class="fa-solid fa-circle-check"></i> ¡Mensaje enviado!</h2>
    <p>Nos pondremos en contacto a la brevedad</p>
</div>

<section class="perfil">

    <div class="success-banner">
        <i class="fa-solid fa-envelope-open-text"></i>
        <div>
            <strong>Gracias, <?= htmlspecialchars($contacto->getNombre()) ?>.</strong>
            <p>Tu consulta sobre <strong><?= htmlspecialchars($contacto->getAsunto()) ?></strong> fue registrada con éxito.</p>
        </div>
    </div>

    <h3><i class="fa-solid fa-list-check"></i> Resumen de tu consulta</h3>

    <div class="resumen-grid">
        <div class="resumen-item">
            <span class="resumen-label"><i class="fa-solid fa-user"></i> Nombre</span>
            <span><?= htmlspecialchars($contacto->getNombre()) ?></span>
        </div>
        <div class="resumen-item">
            <span class="resumen-label"><i class="fa-solid fa-envelope"></i> Email</span>
            <span><?= htmlspecialchars($contacto->getEmail()) ?></span>
        </div>
        <div class="resumen-item">
            <span class="resumen-label"><i class="fa-solid fa-phone"></i> Teléfono</span>
            <span><?= htmlspecialchars($contacto->getTelefono()) ?: '<em class="text-muted">No proporcionado</em>' ?></span>
        </div>
        <div class="resumen-item resumen-full">
            <span class="resumen-label"><i class="fa-solid fa-tag"></i> Asunto</span>
            <span><?= htmlspecialchars($contacto->getAsunto()) ?></span>
        </div>
        <div class="resumen-item resumen-full">
            <span class="resumen-label"><i class="fa-solid fa-comment"></i> Mensaje</span>
            <span><?= nl2br(htmlspecialchars($contacto->getMensaje())) ?></span>
        </div>
    </div>

    <div class="perfil-cta">
        <a class="btn btn-accent" href="index.php?s=inicio">
            <i class="fa-solid fa-house"></i> Volver al inicio
        </a>
    </div>

</section>