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

    public function __construct(int $id, string $especie, array $raza, string $nombre, int $edad, string $sexo, string $imagen, string $descripcion)
    {
        $this->id          = $id;
        $this->especie     = $especie;
        $this->raza        = $raza;
        $this->nombre      = $nombre;
        $this->edad        = $edad;
        $this->sexo        = $sexo;
        $this->imagen      = $imagen;
        $this->descripcion = $descripcion;
    }

    /**
     * Carga todos los animales desde el archivo JSON.
     *
     * @return array Array de objetos Animal.
     */
    public static function cargarTodosLosAnimales(): array
    {
        $json = file_get_contents(__DIR__ .'/../datos/animales.json');
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
                $item['descripcion']
            );
        }

        return $animales;
    }

    //Getters
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

    //Setters
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
}
