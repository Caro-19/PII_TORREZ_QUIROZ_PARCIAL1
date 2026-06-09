<?php
require_once './clases/Adopcion.php';
require_once 'includes/animales.php';

// Verificar que si llega por POST, sino redirige al formulario de adopcion
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ./index.php?s=adopcion");
    exit;
};

$id = (int)($_POST['animal'] ?? 0);

if (!isset($animales[$id])) {
    header("Location: ./index.php?s=404");
    exit;
};

//Validacion antes de crear el objeto de adopcion
$errores = [];
$nombre   = trim($_POST['nombre']   ?? '');
$email    = trim($_POST['email']    ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$motivo   = trim($_POST['motivo']   ?? '');

if (strlen($nombre) < 2 || !preg_match('/^[\p{L}\s\'\-]+$/u', $nombre)) {
    $errores[] = 'Nombre inválido.';
}    
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = 'Email inválido.';
}    
if ($telefono !== '' && !preg_match('/^[\d\s+\-().]{6,20}$/', $telefono)) {
    $errores[] = 'Teléfono inválido.';
}    
if (strlen($motivo) < 30) {
    $errores[] = 'El motivo debe tener al menos 30 caracteres.';
}    

//Frena si hay errores
if (!empty($errores)) {
    header("Location: ./index.php?s=adoptar&animal=" . $id . "&error=" . urlencode(implode(' | ', $errores)));
    exit;
}

//Crea el objeto luego de validar los datos.
$animalObj = $animales[$id];
$adopcion = new Adopcion($id, $animalObj, $nombre, $email, $telefono, $motivo);

