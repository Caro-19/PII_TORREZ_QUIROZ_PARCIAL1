<?php
// La clase Animal representa a un animal en la seccion de adopciones.
class Animal
{
    // Propiedades privadas para encapsulación
    private int $id;
    private string $especie;
    private array $raza;
    private string $nombre;
    private int $edad;
    private string $sexo;
    private string $imagen;
    private string $descripcion;
    private string $emoji;
    
    // Constructor para inicializar las propiedades
    public function __construct(int $id, string $especie, array $raza, string $nombre, int $edad, string $sexo, string $imagen, string $descripcion = '', string $emoji = '')
    {
        $this->id          = $id;
        $this->especie     = $especie;
        $this->raza        = $raza;
        $this->nombre      = $nombre;
        $this->edad        = $edad;
        $this->sexo        = $sexo;
        $this->imagen      = $imagen;
        $this->descripcion = $descripcion;
        $this->emoji       = $emoji;
    }

    // Metodos públicos para acceder a las propiedades (getters)
    public function getId(): int
    {
        return $this->id;
    }
    public function getEspecie(): string
    {
        return $this->especie;
    }
    public function getRaza(): array
    {
        return $this->raza;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getEdad(): int
    {
        return $this->edad;
    }
    public function getSexo(): string
    {
        return $this->sexo;
    }
    public function getImagen(): string
    {
        return $this->imagen;
    }
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    // Metodos publicos para modificar las propiedades (setters)
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setEspecie(string $especie): void
    {
        $this->especie = $especie;
    }
    public function setRaza(array $raza): void
    {
        $this->raza = $raza;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setEdad(int $edad): void
    {
        $this->edad = $edad;
    }
    public function setSexo(string $sexo): void
    {
        $this->sexo = $sexo;
    }
    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }
    public function setEmoji(string $emoji): void
    {
        $this->emoji = $emoji;
    }

}
