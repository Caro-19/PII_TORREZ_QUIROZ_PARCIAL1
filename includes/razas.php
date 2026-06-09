<?php
require_once './clases/Raza.php';

$json = file_get_contents(__DIR__ . '/../datos/razas.json');
$razaDatos = json_decode($json, true);

$razas = [];

 foreach ($razaDatos as $r) {
    $razas[$r['id']] = new Raza(
        $r['id'],
        $r['especie'],
        $r['nombre'],
        $r['tamanio'],
        $r['nivelEnergia']
    );
}
