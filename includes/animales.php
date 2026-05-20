<?php
require_once __DIR__ . '/../clases/Animal.php';
$json = file_get_contents(__DIR__ . '/../datos/animales.json');
$animales_datos = json_decode($json, true);

$animales = [];

foreach ($animales_datos as $item) {
    $animales[$item['id']] = new Animal(
        $item['id'],
        $item['nombre'],
        $item['especie'],
        $item['edad'],
        $item['raza'],
        $item['sexo'],
        $item['descripcion'],
        $item['emoji'],
        $item['imagen']
    );
}
