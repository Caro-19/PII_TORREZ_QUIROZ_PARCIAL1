<?php
require_once __DIR__ . '/../clases/Animal.php';
$animales = Animal::cargarTodosLosAnimales();
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

<!-- PROPÓSITO -->
<section class="features">
    <div class="section-header">
        <h2>Nuestro Propósito</h2>
        <p>
            En PetVet creemos que cada mascota merece una segunda oportunidad.
            Nuestra misión es conectar animales que buscan un hogar con personas
            dispuestas a brindarles amor, cuidado y una adopción responsable.
            Además, ayudamos a los usuarios a encontrar la mascota que mejor se
            adapta a su estilo de vida mediante recomendaciones personalizadas.
        </p>
    </div>

    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon-wrap">
                <i class="fa-solid fa-heart"></i>
            </div>
            <h3>Adopción Responsable</h3>
            <p>
                Promovemos adopciones conscientes para garantizar el bienestar
                tanto de las mascotas como de sus futuras familias.
            </p>
        </div>

        <div class="feature-card">
            <div class="feature-icon-wrap">
                <i class="fa-solid fa-house"></i>
            </div>
            <h3>Un Hogar para Cada Mascota</h3>
            <p>
                Buscamos reducir el abandono animal ayudando a que perros y gatos
                encuentren un hogar seguro y lleno de cariño.
            </p>
        </div>

        <div class="feature-card">
            <div class="feature-icon-wrap">
                <i class="fa-solid fa-paw"></i>
            </div>
            <h3>Mascota Ideal</h3>
            <p>
                Nuestro sistema de recomendaciones ayuda a encontrar mascotas
                compatibles con el estilo de vida de cada usuario.
            </p>
        </div>
    </div>
</section>

<!-- PROCESO DE ADOPCION -->
<section class="adoption-process" id="como-funciona">
    <div class="section-header">
        <h2>Proceso de Adopción</h2>
        <p>
            Encontrar a tu nuevo compañero es muy fácil.
        </p>
    </div>

    <div class="process-steps">

        <div class="process-step">
            <div class="step-number">1</div>
            <div class="step-content">
                <h3>Explorá las mascotas</h3>
                <p>
                    Conocé a los animales disponibles y descubrí cuál podría ser tu compañero ideal.
                </p>
            </div>
        </div>

        <div class="process-step">
            <div class="step-number">2</div>
            <div class="step-content">
                <h3>Realizá el test</h3>
                <p>
                    Completá Mascota Ideal para recibir recomendaciones personalizadas.
                </p>
            </div>
        </div>

        <div class="process-step">
            <div class="step-number">3</div>
            <div class="step-content">
                <h3>Enviá tu solicitud</h3>
                <p>
                    Contactanos para comenzar el proceso de adopción responsable.
                </p>
            </div>
        </div>

    </div>
</section>