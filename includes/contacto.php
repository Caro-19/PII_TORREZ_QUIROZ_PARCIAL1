<?php
require_once './clases/Contacto.php';

// Verificar que llega por POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ./index.php?s=contacto");
    exit;
}

// Obtener y limpiar datos
$nombre   = trim($_POST['nombre']   ?? '');
$email    = trim($_POST['email']    ?? '');
$telefono = trim($_POST['telefono'] ?? '');
$asunto   = trim($_POST['asunto']   ?? '');
$mensaje  = trim($_POST['mensaje']  ?? '');

// Validaciones
$errores = [];

if (strlen($nombre) < 2 || !preg_match('/^[\p{L}\s\'\-]+$/u', $nombre)) {
    $errores[] = 'Nombre inválido.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = 'Email inválido.';
}
if ($telefono !== '' && !preg_match('/^[\d\s+\-().]{6,20}$/', $telefono)) {
    $errores[] = 'Teléfono inválido.';
}
if (strlen($asunto) < 3) {
    $errores[] = 'El asunto es demasiado corto.';
}
if (strlen($mensaje) < 10) {
    $errores[] = 'El mensaje debe tener al menos 10 caracteres.';
}

// Frena si hay errores
if (!empty($errores)) {
    header("Location: ./index.php?s=contacto&error=" . urlencode(implode(' | ', $errores)));
    exit;
}

//Leer el JSON
$jsonPath   = __DIR__ . '/../datos/contactos.json';
$contactos  = [];

if (file_exists($jsonPath)) {
    $contactos = json_decode(file_get_contents($jsonPath), true) ?? [];
}

//ID autoincremental
$nuevoId = empty($contactos)
    ? 1
    : max(array_column($contactos, 'id')) + 1;

//Crear objeto
$contacto = new Contacto($nuevoId, $nombre, $email, $telefono, $asunto, $mensaje);

//Guardar en el JSON
$contactos[] = [
    'id'       => $contacto->getId(),
    'nombre'   => $contacto->getNombre(),
    'email'    => $contacto->getEmail(),
    'telefono' => $contacto->getTelefono(),
    'asunto'   => $contacto->getAsunto(),
    'mensaje'  => $contacto->getMensaje(),
];

file_put_contents(
    $jsonPath,
    json_encode($contactos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
);