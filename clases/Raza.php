<?php
class Raza
{

    private int $id;
    private string $especie;
    private string $nombre;
    private string $tamanio;
    private string $nivelEnergia;

    public function __construct(int $id, string $especie, string $nombre, string $tamanio, string $nivelEnergia){
        $this->id               = $id;
        $this->especie          = $especie;
        $this->nombre           = $nombre;
        $this->tamanio          = $tamanio;
        $this->nivelEnergia     = $nivelEnergia; 
    }

    // --- GETTERS & SETTERS ---

    public function getId(): int 
    {
        return $this->id;
    }

    public function setId(int $id): void 
    {
        $this->id = $id;
    }

    public function getEspecie(): string 
    {
        return $this->especie;
    }

    public function setEspecie(string $especie): void 
    {
        $this->especie = $especie;
    }

    public function getNombre(): string 
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void 
    {
        $this->nombre = $nombre;
    }

    public function getTamanio(): string 
    {
        return $this->tamanio;
    }

    public function setTamanio(string $tamanio): void 
    {
        $this->tamanio = $tamanio;
    }

    public function getNivelDeEnergia(): string 
    {
        return $this->nivelEnergia;
    }

    public function setNivelDeEnergia(string $nivelEnergia): void 
    {
        $this->nivelEnergia = $nivelEnergia;
    }

}