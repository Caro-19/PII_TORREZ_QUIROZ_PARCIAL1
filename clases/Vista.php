<?PHP
class Vista
{
    private int $id;
    private string $nombre;
    private string $titulo;
    private bool $activa;
    private bool $restringida;

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
                return $vista;
            }
        }

        // Si no se encuentra la vista, se devuelve una vista de error 404
        $vista = new self();
        $vista->id = 5;
        $vista->nombre = '404';
        $vista->titulo = '404 - Página no encontrada';
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
