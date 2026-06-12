<?php
require_once './clases/Adopcion.php';
require_once './clases/Animal.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ./index.php?s=adopcion");
    exit;
}

$id       = (int)($_POST['animal']   ?? 0);
$nombre   = trim($_POST['nombre']    ?? '');
$email    = trim($_POST['email']     ?? '');
$telefono = trim($_POST['telefono']  ?? '');
$motivo   = trim($_POST['motivo']    ?? '');

$resultado = Adopcion::procesar($id, $nombre, $email, $telefono, $motivo);

// Si devolvió un array, son errores
if (is_array($resultado)) {
    header("Location: ./index.php?s=adoptar&animal=" . $id . "&error=" . urlencode(implode(' | ', $resultado)));
    exit;
}

$adopcion = $resultado;