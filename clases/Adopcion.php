<?php
// La clase Adopcion representa una solicitud de adopción de un animal en la sección de adopciones.
class Adopcion
{
    private int $id;
    private Animal $idAnimal;
    private string $nombreAdoptante;
    private string $email;
    private string $telefono;
    private string $motivo;

    public function __construct(int $id, Animal $idAnimal, string $nombreAdoptante, string $email, string $telefono, string $motivo)
    {
        $this->id              = $id;
        $this->idAnimal        = $idAnimal;
        $this->nombreAdoptante = $nombreAdoptante;
        $this->email           = $email;
        $this->telefono        = $telefono;
        $this->motivo          = $motivo;
    }

    /**
     * Valida los datos del formulario de adopción.
     *
     * @param string $nombre -> Nombre del adoptante.
     * @param string $email -> Email del adoptante.
     * @param string $telefono -> Teléfono del adoptante.
     * @param string $motivo -> Motivo de adopción.
     * @return array Array de errores. Vacío si no hay errores.
     */
    public static function validarDatosAdopcion(string $nombre, string $email, string $telefono, string $motivo): array
    {
        $errores = [];

        if (strlen($nombre) < 2 || !preg_match('/^[\p{L}\s\'\-]+$/u', $nombre))
            $errores[] = 'Nombre inválido.';
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $errores[] = 'Email inválido.';
        if ($telefono !== '' && !preg_match('/^[\d\s+\-().]{6,20}$/', $telefono))
            $errores[] = 'Teléfono inválido.';
        if (strlen($motivo) < 30)
            $errores[] = 'El motivo debe tener al menos 30 caracteres.';

        return $errores;
    }

    /**
     * Guarda la solicitud de adopción en el archivo JSON.
     *
     * @param string $jsonPath Ruta al archivo JSON.
     * @return void
     */
    public function guardarEnJson(string $jsonPath): void
    {
        $adopciones = [];

        if (file_exists($jsonPath))
            $adopciones = json_decode(file_get_contents($jsonPath), true) ?? [];

        $nuevoId = empty($adopciones) ? 1 : max(array_column($adopciones, 'id')) + 1;
        $this->setId($nuevoId);

        $adopciones[] = [
            'id'              => $this->getId(),
            'idAnimal'        => $this->getIdAnimal()->getId(),
            'nombreAnimal'    => $this->getIdAnimal()->getNombre(),
            'nombreAdoptante' => $this->getNombreAdoptante(),
            'email'           => $this->getEmail(),
            'telefono'        => $this->getTelefono(),
            'motivo'          => $this->getMotivo(),
        ];

        file_put_contents($jsonPath, json_encode($adopciones, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    /**
     * Procesa una solicitud de adopción: valida, crea y guarda en JSON.
     *
     * @param int    $idAnimal ID del animal a adoptar.
     * @param string $nombre   Nombre del adoptante.
     * @param string $email    Email del adoptante.
     * @param string $telefono Teléfono del adoptante.
     * @param string $motivo   Motivo de adopción.
     * @return Adopcion|array  Objeto Adopcion si fue exitoso, array de errores si falló.
     */
    public static function procesar(int $idAnimal, string $nombre, string $email, string $telefono, string $motivo): Adopcion|array
    {
        //VALIDAR
        $errores = self::validarDatosAdopcion($nombre, $email, $telefono, $motivo);
        if (!empty($errores)) return $errores;

        //CREAR OBJETO
        $animales = Animal::cargarTodosLosAnimales();
        $animal   = $animales[$idAnimal] ?? null;

        if (!$animal) return ['Animal no encontrado.'];

        $adopcion = new Adopcion(0, $animal, $nombre, $email, $telefono, $motivo);

        //GUARDAR
        $adopcion->guardarEnJson(__DIR__ . '/../datos/adopcion.json');

        return $adopcion;
    }

    //Getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getIdAnimal(): Animal
    {
        return $this->idAnimal;
    }
    public function getNombreAdoptante(): string
    {
        return $this->nombreAdoptante;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getTelefono(): string
    {
        return $this->telefono;
    }
    public function getMotivo(): string
    {
        return $this->motivo;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setIdAnimal(Animal $idAnimal): void
    {
        $this->idAnimal = $idAnimal;
    }
    public function setNombreAdoptante(string $nombre): void
    {
        $this->nombreAdoptante = $nombre;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }
    public function setMotivo(string $motivo): void
    {
        $this->motivo = $motivo;
    }
}
