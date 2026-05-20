<?PHP
class Vista
{
    private int $id;
    private string $nombre;
    private string $url;
    private bool $activa;
    private bool $restringida;
    private bool $nav;

    public function __construct(int $id, string $nombre, string $url, bool $activa = true, bool $restringida = false, bool $nav = true)
    {
        $this->id          = $id;
        $this->nombre      = $nombre;
        $this->url         = $url;
        $this->activa      = $activa;
        $this->restringida = $restringida;
        $this->nav         = $nav;
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
    public function getUrl(): string
    {
        return $this->url;
    }
    public function getActiva(): bool
    {
        return $this->activa;
    }
    public function getRestringida(): bool
    {
        return $this->restringida;
    }
    public function getNav(): bool
    {
        return $this->nav;
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
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
    public function setActiva(bool $activa): void
    {
        $this->activa = $activa;
    }
    public function setRestringida(bool $restringida): void
    {
        $this->restringida = $restringida;
    }
    public function setNav(bool $nav): void
    {
        $this->nav = $nav;
    }
}
