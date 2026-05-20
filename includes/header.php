<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../clases/Vista.php';
require_once __DIR__ . '/../includes/verificar_vista.php';

$vistas_json = file_get_contents(__DIR__ . '/../datos/vistas.json');
$vistas_datos = json_decode($vistas_json, true);
$vistas = array_map(
    function ($vista) {
        return new Vista($vista['id'], $vista['nombre'],$vista['url'], $vista['activa'], $vista['restringida'], $vista['nav']);
    }, 
    $vistas_datos
);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetVet — Adopciones</title>

    <!-- Google Fonts: Nunito -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,800&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/styles.css">
</head>

<body>

    <header>
        <div class="header-inner">
            <a href="<?php echo BASE_URL; ?>index.php" class="logo">
                <i class="fa-solid fa-paw"></i> PetVet
            </a>
            <nav>
                <?php
                foreach ($vistas as $vista){
                    if (($vista -> getNav()) && $vista -> getActiva()) {
                        $url = BASE_URL . $vista->getUrl();
                ?>
                
                <a href="<?= $url ?>">
                    <?= htmlspecialchars($vista -> getNombre()) ?>
                </a>

                <?php  
                    }
                } 
                ?>
                
            </nav>
        </div>
    </header>

    <main>