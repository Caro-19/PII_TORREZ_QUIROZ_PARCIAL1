<?PHP
class Vista
{
    private int $id;
    private string $nombre;
    private string $titulo;
    private bool $activa;
    private bool $restringida;

    /**
     * Valida la vista solicitada y devuelve un objeto Vista correspondiente.
     *
     * @param string $pedido Nombre de la vista solicitada via GET.
     * @return Vista Objeto Vista con los datos correspondientes.
     */
    public static function validarVista(string $pedido): Vista
    {
        $datos = file_get_contents(__DIR__ . '/../datos/vistas.json');
        $jsonDatos = json_decode($datos);

        // Se recorre el JSON para encontrar la vista solicitada
        foreach ($jsonDatos as $v) {
            if ($v->nombre == $pedido) {
                $vista = new self();
                $vista->id = $v->id;
                $vista->nombre = $v->nombre;
                $vista->titulo = $v->titulo;
                $vista->activa = $v->activa;
                $vista->restringida = $v->restringida;

                // Si la vista está desactivada → devuelve 503
                if (!$vista->activa) {
                    return self::vistaError(503, '503', '503 - Servicio no disponible');
                }

                if ($vista->restringida) {
                    // Si la vista es restringida → devuelve 403
                    return self::vistaError(403, '403', '403 - Página prohibida');
                }

                return $vista;
            }
        }

        // Si no existe → devuelve 404
        return self::vistaError(5, '404', '404 - Página no encontrada');
    }

    private static function vistaError(int $id, string $nombre, string $titulo): Vista
    {
        $vista = new self();
        $vista->id = $id;
        $vista->nombre = $nombre;
        $vista->titulo = $titulo;
        $vista->activa = false;
        $vista->restringida = false;

        return $vista;
    }

    //GETTERS
    public function getId(): int
    {
        return $this->id;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getTitulo(): string
    {
        return $this->titulo;
    }
    public function getActiva(): bool
    {
        return $this->activa;
    }
    public function getRestringida(): bool
    {
        return $this->restringida;
    }


    //SETTERS
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }
    public function setActiva(bool $activa): void
    {
        $this->activa = $activa;
    }
    public function setRestringida(bool $restringida): void
    {
        $this->restringida = $restringida;
    }
}
