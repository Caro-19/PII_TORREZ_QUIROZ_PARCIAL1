<?php
require_once __DIR__ . '/../clases/Raza.php';
$razas = Raza::cargarTodasLasRazas();
?>

<div class="page-header">
    <h2>
        Tu Mascota Ideal
    </h2>
    <p>Respondé algunas preguntas y descubrí qué mascota se adapta mejor a tu estilo de vida.</p>
</div>

<section class="form-page">


    <div class="form-page-intro">

        <h2>Encontrá tu compañero ideal</h2>

        <p>
            Cada mascota tiene necesidades distintas.
            Este formulario nos ayuda a recomendarte
            las opciones más compatibles con vos.
        </p>

        <div class="feature-card">
            <div class="feature-icon-wrap">
                <i class="fa-solid fa-heart"></i>
            </div>

            <h3>Adopción responsable</h3>

            <p>
                Buscamos la mejor combinación entre
                las necesidades de la mascota y tu hogar.
            </p>
        </div>

        <div class="feature-card" style="margin-top:1rem;">
            <div class="feature-icon-wrap">
                <i class="fa-solid fa-shield-dog"></i>
            </div>

            <h3>Recomendación personalizada</h3>

            <p>
                Analizamos espacio, familia y nivel de actividad
                para sugerirte las mejores opciones.
            </p>
        </div>

    </div>
    <form method="POST" action="index.php?s=resultados">
        <!-- TIPO DE MASCOTA -->
        <div class="form-group">

            <label>
                <i class="fa-solid fa-paw"></i>
                ¿Qué mascota te gustaría adoptar?
            </label>

            <div class="checkbox-flex">

                <div class="checkbox-item">
                    <input
                        type="radio"
                        name="tipoMascota"
                        value="Perro"
                        id="tipo_perro"
                        required>

                    <label for="tipo_perro">
                        Perro
                    </label>
                </div>

                <div class="checkbox-item">
                    <input
                        type="radio"
                        name="tipoMascota"
                        value="Gato"
                        id="tipo_gato">

                    <label for="tipo_gato">
                        Gato
                    </label>
                </div>

                <div class="checkbox-item">
                    <input
                        type="radio"
                        name="tipoMascota"
                        value="Ambos"
                        id="tipo_ambos">

                    <label for="tipo_ambos">
                        Ambos
                    </label>
                </div>

            </div>

        </div>

        <!-- RAZA PREFERIDA -->
        <div class="form-group">
            <label><i class="fa-solid fa-dna"></i> Razas preferidas <span class="label-optional">(elegí hasta 3)</span></label>
            <div class="checkbox-flex">
                <?php foreach ($razas as $r): ?>
                    <div class="checkbox-item">
                        <input
                            type="checkbox"
                            name="razas[]"
                            value="<?= htmlspecialchars($r->getNombre()) ?>"
                            id="raza_<?= $r->getId() ?>"
                            data-especie="<?= htmlspecialchars($r->getEspecie()) ?>">

                        <label for="raza_<?= $r->getId() ?>">
                            <?= htmlspecialchars($r->getNombre()) ?>
                        </label>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="contenedor-flex">

            <!-- ESPACIO DISPONIBLE -->
            <div class="form-group">
                <label for="espacio"><i class="fa-solid fa-house"></i> ¿Qué espacio ofrecés?</label>
                <select name="espacio" id="espacio" required>
                    <option value="" disabled selected>Seleccioná una opción</option>
                    <option value="pequeño">Departamento pequeño</option>
                    <option value="mediano">Departamento grande</option>
                    <option value="grande">Casa sin jardín</option>
                    <option value="gigante">Casa con jardín</option>
                </select>
            </div>

            <!-- CANTIDAD DE FAMILIARES -->
            <div class="form-group">
                <label for="familiares"><i class="fa-solid fa-users"></i> ¿Cuántas personas viven en tu hogar?</label>
                <select name="familiares" id="familiares" required>
                    <option value="" disabled selected>Seleccioná una opción</option>
                    <option value="1">Solo yo</option>
                    <option value="2">2 personas</option>
                    <option value="3">3 a 4 personas</option>
                    <option value="4">5 o más personas</option>
                </select>
            </div>
        </div>
        <!-- NIVEL DE ENERGÍA -->
        <div class="form-group">
            <label><i class="fa-solid fa-bolt"></i> ¿Qué nivel de energía preferís en tu mascota?</label>
            <div class="checkbox-flex">
                <div class="checkbox-item">
                    <input type="radio" name="energia" value="Bajo" id="energia_bajo" required>
                    <label for="energia_bajo">
                        Tranquila
                    </label>
                </div>
                <div class="checkbox-item">
                    <input type="radio" name="energia" value="Medio" id="energia_medio">
                    <label for="energia_medio">
                        Moderada
                    </label>
                </div>
                <div class="checkbox-item">
                    <input type="radio" name="energia" value="Alto" id="energia_medio_alto">
                    <label for="energia_medio_alto">
                        Activa
                    </label>
                </div>
                <div class="checkbox-item">
                    <input type="radio" name="energia" value="Muy Alto" id="energia_alto">
                    <label for="energia_alto">
                        Muy activa
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-accent btn-lg btn-block">
            <i class="fa-solid fa-magnifying-glass"></i> Encontrar mi mascota ideal
        </button>

    </form>
</section>

<script src="js/FormMascotaideal.js"></script>