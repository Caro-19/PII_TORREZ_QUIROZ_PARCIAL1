<?php
require_once __DIR__ . '/../includes/animales.php';
?>
<section class="hero">
    <div class="hero-banner">
        <div class="hero-inner">
            <div class="hero-text">
                <p class="hero-eyebrow">
                    <i class="fa-solid fa-paw"></i> Adopciones abiertas
                </p>
                <h1>Dale un hogar a<br><em>quien lo necesita</em></h1>
                <p>En PetVet conectamos animales que buscan familia con personas que buscan compañía. Adoptá con amor y responsabilidad.</p>
                <div class="hero-actions">
                    <a class="btn btn-accent btn-lg" href="index.php?s=adopcion">
                        Ver animales <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a class="btn btn-outline btn-lg" href="#como-funciona">
                        Cómo funciona
                    </a>
                </div>
            </div>
            <div class="hero-image">
                <img
                    src="https://images.unsplash.com/photo-1450778869180-41d0601e046e?w=700&h=560&fit=crop&auto=format&q=80"
                    alt="Perro y gato juntos esperando adopción">
                <div class="hero-image-badge">
                    <i class="fa-solid fa-circle-check"></i>
                    Todos vacunados y desparasitados
                </div>
            </div>
        </div>
    </div>
    <div class="hero-stats">
        <div class="stat">
            <span class="stat-num"><?= count($animales) ?></span>
            <span class="stat-label"><i class="fa-solid fa-paw"></i> Animales esperándote</span>
        </div>
        <div class="stat">
            <span class="stat-num">100%</span>
            <span class="stat-label"><i class="fa-solid fa-shield-heart"></i> Vacunados</span>
        </div>
        <div class="stat">
            <span class="stat-num">$0</span>
            <span class="stat-label"><i class="fa-solid fa-tag"></i> Costo de adopción</span>
        </div>
    </div>
</section>

<!-- CÓMO FUNCIONA -->
<section class="features" id="como-funciona">
    <div class="section-header">
        <h2>¿Cómo funciona?</h2>
        <p>El proceso es simple, transparente y está pensado para el bienestar de cada animal.</p>
    </div>
    <div class="features-grid">
        <div class="feature-card">
            <a href="index.php?s=adopcion">
                <div class="feature-icon-wrap">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <span class="feature-step">01</span>
                <h3>Explorá los perfiles</h3>
                <p>Conocé a cada animal: su historia, personalidad y necesidades. Encontrá el compañero ideal para tu estilo de vida.</p>
            </a>
        </div>
        <div class="feature-card">
            <a href="index.php?s=mascotaIdeal">
                <div class="feature-icon-wrap">
                    <i class="fa-solid fa-file-pen"></i>
                </div>
                <span class="feature-step">02</span>
                <h3>Completá el formulario</h3>
                <p>Contanos sobre vos y tu hogar. Queremos asegurarnos de que sea la combinación perfecta para ambos.</p>
            </a>
        </div>
        <div class="feature-card">
            <a href="index.php?s=contacto">
                <div class="feature-icon-wrap">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <span class="feature-step">03</span>
                <h3>Llevate a tu compañero</h3>
                <p>Nos ponemos en contacto, coordinamos la entrega y te acompañamos en los primeros pasos de la convivencia.</p>
            </a>
        </div>
    </div>
</section>