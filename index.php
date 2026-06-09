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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <div class="header-inner">
            <a href="index.php?s=inicio" class="logo">
                <i class="fa-solid fa-paw"></i> PetVet
            </a>
            <nav>
                <ul>
                    <li><a href="index.php?s=inicio">Inicio</a></li>
                    <li><a href="index.php?s=adopcion">Adopciones</a></li>
                    <li><a href="index.php?s=mascotaIdeal">Mascota Ideal</a></li>
                    <li><a href="index.php?s=contacto">Contacto</a></li>
                </ul>

            </nav>
        </div>
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

</html>