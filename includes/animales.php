<?php
require_once './clases/Animal.php';
$json = file_get_contents('./datos/animales.json');
$animalesDatos = json_decode($json, true);

$animales = [];

foreach ($animalesDatos as $item) {

    $animales[$item['id']] = new Animal(
        $item['id'],
        $item['especie'],
        $item['raza'],
        $item['nombre'],
        $item['edad'],
        $item['sexo'],
        $item['imagen'],
        $item['descripcion'],
        $item['emoji']
    );
}