<?php
require_once __DIR__ . '/../clases/Animal.php';
require_once __DIR__ . '/../clases/Raza.php';

$animales = Animal::cargarTodosLosAnimales();
$razas = Raza::cargarTodasLasRazas();

// Si no viene un POST redirige al test
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?s=mascotaIdeal');
    exit;
}

/*
   DATOS DEL FORMULARIO
 */

$razasElegidas  = $_POST['razas'] ?? [];
$tipoMascota    = $_POST['tipoMascota'] ?? 'Ambos';
$espacio        = $_POST['espacio'] ?? '';
$familiares     = (int)($_POST['familiares'] ?? 0);
$energiaElegida = $_POST['energia'] ?? '';

/* 
   VALIDACIONES
 */

// Máximo 3 razas
if (count($razasElegidas) > 3) {
    header('Location: index.php?s=mascotaIdeal');
    exit;
}

// Tipo de mascota
$tiposPermitidos = [
    'Perro',
    'Gato',
    'Ambos'
];

if (!in_array($tipoMascota, $tiposPermitidos)) {
    header('Location: index.php?s=mascotaIdeal');
    exit;
}

// Espacio
$espaciosPermitidos = [
    'pequeño',
    'mediano',
    'grande',
    'gigante'
];

if (!in_array($espacio, $espaciosPermitidos)) {
    header('Location: index.php?s=mascotaIdeal');
    exit;
}

// Familiares
if (!in_array($familiares, [1, 2, 3, 4])) {
    header('Location: index.php?s=mascotaIdeal');
    exit;
}

// Energía
$energiasPermitidas = [
    'Bajo',
    'Medio',
    'Alto',
    'Muy Alto'
];

if (!in_array($energiaElegida, $energiasPermitidas)) {
    header('Location: index.php?s=mascotaIdeal');
    exit;
}



//Espacio → tamaños compatibles
$espacioCompatible = [
    'pequeño' => ['Pequeño', 'Toy'],
    'mediano' => ['Pequeño', 'Toy', 'Mediano'],
    'grande'  => ['Pequeño', 'Toy', 'Mediano', 'Grande'],
    'gigante' => ['Pequeño', 'Toy', 'Mediano', 'Grande', 'Gigante'],
];

// Familiares → niveles de energía compatibles
$familiaresCompatible = [
    1 => ['Bajo', 'Medio'],
    2 => ['Bajo', 'Medio', 'Alto'],
    3 => ['Bajo', 'Medio', 'Alto', 'Muy Alto'],
    4 => ['Bajo', 'Medio', 'Alto', 'Muy Alto'],
];

$tamaniosValidos = $espacioCompatible[$espacio]       ?? [];
$energiasValidas = $familiaresCompatible[$familiares] ?? [];

//Puntaje por animal 
$puntajes = [];

foreach ($animales as $id => $animal) {
    $puntos = 0;

    // Filtrar por especie elegida
    if (
        $tipoMascota !== 'Ambos' &&
        $animal->getEspecie() !== $tipoMascota
    ) {
        continue;
    }

    // Recorremoa las razas del animal pra calcular la compatibilidad
    foreach ($animal->getRaza() as $nombreRaza) {

        $razaObj = null;
        foreach ($razas as $r) {
            if (
                stripos($r->getNombre(), $nombreRaza) !== false ||
                stripos($nombreRaza, $r->getNombre()) !== false
            ) {
                $razaObj = $r;
                break;
            }
        }

        if (!$razaObj) continue;

        if (in_array($razaObj->getTamanio(), $tamaniosValidos))        $puntos += 35;
        if (in_array($razaObj->getNivelDeEnergia(), $energiasValidas)) $puntos += 25;
        if ($razaObj->getNivelDeEnergia() === $energiaElegida)         $puntos += 20;
        if (in_array($nombreRaza, $razasElegidas))                     $puntos += 10;
    }

    $puntajes[$id] = $puntos;
}

$puntajes = array_filter(
    $puntajes,
    fn($puntos) => $puntos > 0
);

arsort($puntajes);
$top3 = array_slice($puntajes, 0, 3, true);

if (empty($puntajes)) {
?>
    <div class="page-header">
        <h2>
            <i class="fa-solid fa-circle-exclamation"></i>
            No encontramos coincidencias
        </h2>
        <p>Probá ampliando tus preferencias o seleccionando más opciones.</p>
    </div>

    <div>
        <a href="index.php?s=mascotaIdeal" class="btn btn-accent">
            Volver al formulario
        </a>
    </div>
<?php
    exit;
}

$puntajeMaximo = max($puntajes);

?>

<div class="page-header">
    <h2><i class="fa-solid fa-trophy"></i> Tu Top 3 de mascotas</h2>
    <p>Estas son las mascotas que mejor se adaptan a tu estilo de vida</p>
</div>

<section class="cards">
    <?php
    $medallas = ['🥇', '🥈', '🥉'];
    $pos = 0;
    foreach ($top3 as $id => $puntos):
        $animal = $animales[$id];
    ?>
        <article class="card">
            <div class="card-photo">
                <img
                    src="<?= htmlspecialchars($animal->getImagen()) ?>"
                    alt="Foto de <?= htmlspecialchars($animal->getNombre()) ?>"
                    loading="lazy">
                <span class="card-badge badge-<?= strtolower($animal->getEspecie()) ?>">
                    <i class="fa-solid fa-<?= $animal->getEspecie() === 'Perro' ? 'dog' : 'cat' ?>"></i>
                    <?= htmlspecialchars($animal->getEspecie()) ?>
                </span>
            </div>
            <div class="card-body">
                <h3><?= $medallas[$pos] ?> <?= htmlspecialchars($animal->getNombre()) ?></h3>
                <ul class="card-meta">
                    <li>
                        <i class="fa-solid fa-dna"></i>
                        <?= htmlspecialchars(implode(', ', $animal->getRaza())) ?>
                    </li>
                    <li>
                        <i class="fa-solid fa-cake-candles"></i>
                        <?= $animal->getEdad() ?>
                        año<?= $animal->getEdad() != 1 ? 's' : '' ?>
                    </li>
                    <?php
                    $compatibilidad = round(($puntos / $puntajeMaximo) * 100);
                    ?>

                    <li>
                        <i class="fa-solid fa-star"></i>
                        <?= $compatibilidad ?>% de compatibilidad
                    </li>
                </ul>
                <p class="card-desc">
                    <?= htmlspecialchars(mb_substr($animal->getDescripcion(), 0, 90)) ?>...
                </p>
                <a
                    class="btn btn-full"
                    href="index.php?s=perfilXAnimal&animal=<?= urlencode($id) ?>">
                    Ver perfil
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </article>
    <?php
        $pos++;
    endforeach;
    ?>
</section>

<div class="resultados-nav">
    <a href="index.php?s=mascotaIdeal" class="btn btn-accent btn-lg">
        <i class="fa-solid fa-arrow-left"></i>
        Volver a hacer el test
    </a>
    <a href="index.php?s=adopcion" class="btn btn-accent btn-lg">
        Ver adopciones
        <i class="fa-solid fa-arrow-right"></i>
    </a>
</div>