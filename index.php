<?php
require_once 'clases/Vista.php';
$vista = Vista::validarVista($_GET['s'] ?? 'inicio');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetVet - :: <?= $vista->getTitulo() ?></title>

    <!-- Google Fonts: Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,800&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <a class="navbar-brand logo" href="index.php?s=inicio">
                    <i class="fa-solid fa-paw"></i> PetVet
                </a>
                
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#menu">

                    <i class="bi bi-list"></i>
                </button>

                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=inicio">Inicio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=adopcion">Adopciones</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=mascotaIdeal">Mascota Ideal</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=contacto">Contacto</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?s=petShop">Tienda</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
                 
    <main>
        <?php
        require_once 'vistas/' . $vista->getNombre() . '.php';
        ?>
    </main>

    <footer>
        <div class="footer-inner">
            <p class="footer-logo">
                <i class="fa-solid fa-paw"></i> PetVet
            </p>
            <p>Adoptá con responsabilidad · Todos los animales merecen un hogar</p>
            <p class="footer-copy">&copy; <?= date('Y') ?> PetVet Veterinaria</p>
        </div>
    </footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</html>