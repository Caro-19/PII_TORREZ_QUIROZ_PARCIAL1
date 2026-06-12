<?php
class Contacto
{
    private int $id;
    private string $nombre;
    private string $email;
    private string $telefono;
    private string $asunto;
    private string $mensaje;

    public function __construct(int $id, string $nombre, string $email, string $telefono, string $asunto, string $mensaje)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
    }

    /**
     * Guarda el contacto en el archivo JSON con un id autoincrement.
     *
     * @param string $jsonPath Ruta al archivo JSON.
     * @return void
     */
    public function guardarEnJson(string $jsonPath): void
    {
        $contactos = [];

        if (file_exists($jsonPath)) {
            $json = file_get_contents($jsonPath);
            $contactos = json_decode($json, true) ?? [];
        }

        // ID autoincremental
        $nuevoId = empty($contactos) ? 1 : max(array_column($contactos, 'id')) + 1;
        $this->setId($nuevoId);

        $contactos[] = [
            'id'              => $this->getId(),
            'nombre'          => $this->getNombre(),
            'email'           => $this->getEmail(),
            'telefono'        => $this->getTelefono(),
            'asunto'          => $this->getAsunto(),
            'mensaje'         => $this->getMensaje(),
        ];

        file_put_contents($jsonPath, json_encode($contactos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    /**
     * Valida los datos del formulario de contacto.
     *
     * @param string $nombre   Nombre del contactante.
     * @param string $email    Email del contactante.
     * @param string $telefono Teléfono del contactante.
     * @param string $asunto   Asunto del mensaje.
     * @param string $mensaje  Contenido del mensaje.
     * @return array Array de errores. Vacío si no hay errores.
     */
    public static function validarDatosContacto(string $nombre, string $email, string $telefono, string $asunto, string $mensaje): array
    {
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

        return $errores;
    }

    /**
     * Procesa un mensaje de contacto: valida, crea y guarda en JSON.
     *
     * @param string $nombre   Nombre del contactante.
     * @param string $email    Email del contactante.
     * @param string $telefono Teléfono del contactante.
     * @param string $asunto   Asunto del mensaje.
     * @param string $mensaje  Contenido del mensaje.
     * @return Contacto|array  Objeto Contacto si fue exitoso, array de errores si falló.
     */
    public static function procesar(string $nombre, string $email, string $telefono, string $asunto, string $mensaje): Contacto|array
    {
        //VALIDAR
        $errores = self::validarDatosContacto($nombre, $email, $telefono, $asunto, $mensaje);
        if (!empty($errores)) return $errores;

        //CREAR OBJETO
        $contacto = new Contacto(0, $nombre, $email, $telefono, $asunto, $mensaje);

        //GUARDAR
        $contacto->guardarEnJson(__DIR__ . '/../datos/contactos.json');

        return $contacto;
    }


    // Getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getTelefono(): string
    {
        return $this->telefono;
    }
    public function getAsunto(): string
    {
        return $this->asunto;
    }
    public function getMensaje(): string
    {
        return $this->mensaje;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }
    public function setAsunto(string $asunto): void
    {
        $this->asunto = $asunto;
    }
    public function setMensaje(string $mensaje): void
    {
        $this->mensaje = $mensaje;
    }
}
