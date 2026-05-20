<?php
// La clase Animal representa a un animal en la seccion de adopciones.
class Animal
{
    // Propiedades privadas para encapsulación
    private int $id;
    private string $nombre;
    private string $especie;
    private int $edad;
    private string $raza;
    private string $sexo;
    private string $descripcion;
    private string $emoji;
    private string $imagen;

    // Constructor para inicializar las propiedades
    public function __construct(int $id, string $nombre, string $especie, int $edad, string $raza = '', string $sexo = '', string $descripcion = '', string $emoji = '', string $imagen = '')
    {
        $this->id          = $id;
        $this->nombre      = $nombre;
        $this->especie     = $especie;
        $this->edad        = $edad;
        $this->raza        = $raza;
        $this->sexo        = $sexo;
        $this->descripcion = $descripcion;
        $this->emoji       = $emoji;
        $this->imagen      = $imagen;
    }

    // Metodos públicos para acceder a las propiedades (getters)
    public function getId(): int
    {
        return $this->id;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getEspecie(): string
    {
        return $this->especie;
    }
    public function getEdad(): int
    {
        return $this->edad;
    }
    public function getRaza(): string
    {
        return $this->raza;
    }
    public function getSexo(): string
    {
        return $this->sexo;
    }
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }
    public function getEmoji(): string
    {
        return $this->emoji;
    }
    public function getImagen(): string
    {
        return $this->imagen;
    }

    // Metodos publicos para modificar las propiedades (setters)
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setEspecie(string $especie): void
    {
        $this->especie = $especie;
    }
    public function setEdad(int $edad): void
    {
        $this->edad = $edad;
    }
    public function setRaza(string $raza): void
    {
        $this->raza = $raza;
    }
    public function setSexo(string $sexo): void
    {
        $this->sexo = $sexo;
    }
    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }
    public function setEmoji(string $emoji): void
    {
        $this->emoji = $emoji;
    }
    public function setImagen(string $imagen): void
    {
        $this->imagen = $imagen;
    }
}
