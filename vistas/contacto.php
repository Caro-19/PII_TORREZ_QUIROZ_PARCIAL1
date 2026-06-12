<?php
$error = $_GET['error'] ?? '';
?>
<section class="page-header">
    <h2>
        Contactanos
    </h2>
    <p>¿Tenés dudas sobre una adopción? ¿Querés colaborar con PetVet? Estamos para ayudarte.</p>
</section>

<section class="form-page">

    <div class="form-page-intro">
        <h2>Hablemos</h2>

        <p>
            Nuestro equipo acompaña cada proceso de adopción para garantizar
            el bienestar de las mascotas y de sus futuras familias.
        </p>

        <div class="feature-card">
            <div class="feature-icon-wrap">
                <i class="fa-solid fa-phone"></i>
            </div>

            <h3>Atención personalizada</h3>

            <p>
                Respondemos consultas sobre adopciones, requisitos,
                cuidados y seguimiento de cada mascota.
            </p>
        </div>

        <div class="feature-card heart">
            <div class="feature-icon-wrap">
                <i class="fa-solid fa-heart"></i>
            </div>

            <h3>Adopción responsable</h3>

            <p>
                Nuestro objetivo es encontrar el hogar ideal para cada animal.
            </p>
        </div>
    </div>

    <form action="index.php?s=procesarContacto" method="POST" data-validate novalidate>

        <?php if ($error): ?>
            <div class="alert alert-danger">
                <i class="fa-solid fa-circle-exclamation"></i>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="nombre">
                <i class="fa-solid fa-user"></i>
                Nombre completo
            </label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                placeholder="Ej: Juan Pérez"
                required>
            <p class="form-error" role="alert"></p>
        </div>

        <div class="form-group">
            <label for="email">
                <i class="fa-solid fa-envelope"></i>
                Correo electrónico
            </label>

            <input
                type="email"
                id="email"
                name="email"
                placeholder="ejemplo@email.com"
                required>
            <p class="form-error" role="alert"></p>
        </div>

        <div class="form-group">
            <label for="telefono">
                <i class="fa-solid fa-phone"></i>
                Teléfono
            </label>

            <input
                type="tel"
                id="telefono"
                name="telefono"
                placeholder="11 1234 5678">
            <p class="form-error" role="alert"></p>
        </div>

        <div class="form-group">
            <label for="asunto">
                <i class="fa-solid fa-tag"></i>
                Asunto
            </label>

            <input
                type="text"
                id="asunto"
                name="asunto"
                placeholder="Consulta sobre adopción"
                required>
            <p class="form-error" role="alert"></p>
        </div>

        <div class="form-group">
            <label for="mensaje">
                <i class="fa-solid fa-comment"></i>
                Mensaje
            </label>

            <textarea
                id="mensaje"
                name="mensaje"
                placeholder="Contanos cómo podemos ayudarte..."
                required>
            </textarea>
            <p class="form-error" role="alert"></p>
        </div>

        <button type="submit" class="btn btn-accent btn-block">
            <i class="fa-solid fa-paper-plane"></i>
            Enviar consulta
        </button>

    </form>

</section>

<script src="js/validacion.js"></script>