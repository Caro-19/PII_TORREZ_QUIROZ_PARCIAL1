<?php
require_once './clases/Contacto.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ./index.php?s=contacto");
    exit;
}

$nombre   = trim($_POST['nombre']   ?? '');
$email    = trim($_POST['email']    ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$asunto   = trim($_POST['asunto']   ?? '');
$mensaje  = trim($_POST['mensaje']  ?? '');

$resultado = Contacto::procesar($nombre, $email, $telefono, $asunto, $mensaje);

if (is_array($resultado)) {
    header("Location: ./index.php?s=contacto&error=" . urlencode(implode(' | ', $resultado)));
    exit;
}

$contacto = $resultado;