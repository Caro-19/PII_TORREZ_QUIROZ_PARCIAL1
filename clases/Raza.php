<?php
class Raza
{

    private int $id;
    private string $especie;
    private string $nombre;
    private string $tamanio;
    private string $nivelEnergia;

    public function __construct(int $id, string $especie, string $nombre, string $tamanio, string $nivelEnergia)
    {
        $this->id = $id;
        $this->especie = $especie;
        $this->nombre = $nombre;
        $this->tamanio = $tamanio;
        $this->nivelEnergia = $nivelEnergia;
    }

    /**
     * Carga todas las razas desde el archivo JSON y las devuelve como un array de objetos Raza.
     *
     * @return Raza[] Array asociativo de objetos Raza, indexado por su ID.
     */
    public static function cargarTodasLasRazas(): array
    {
        $json = file_get_contents(__DIR__ . '/../datos/razas.json');
        $razasDatos = json_decode($json, true);

        $razas = [];

        foreach ($razasDatos as $item) {
            $razas[$item['id']] = new Raza(
                $item['id'],
                $item['especie'],
                $item['nombre'],
                $item['tamanio'],
                $item['nivelEnergia']
            );
        }

        return $razas;
    }


    // Getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getEspecie(): string
    {
        return $this->especie;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getTamanio(): string
    {
        return $this->tamanio;
    }
    public function getNivelDeEnergia(): string
    {
        return $this->nivelEnergia;
    }



    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setEspecie(string $especie): void
    {
        $this->especie = $especie;
    }
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }
    public function setTamanio(string $tamanio): void
    {
        $this->tamanio = $tamanio;
    }
    public function setNivelDeEnergia(string $nivelEnergia): void
    {
        $this->nivelEnergia = $nivelEnergia;
    }
}
