<?php
function verificarVista(string $nombreVista, array $vistas): void {
    foreach ($vistas as $vista) {
        if ($vista->getNombre() === $nombreVista) {

            if (!$vista->getActiva()) {
                header('Location: ' . BASE_URL . 'vistas/503.php');
                exit;
            }

            if ($vista->getRestringida()) {
                header('Location: ' . BASE_URL . 'vistas/403.php');
                exit;
            }
            return;
        }
    }
}