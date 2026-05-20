<?php
class Test_adoptante{
    private string $espacio;
    private int $cant_miembros;
    private string $tipo_mascota;
    private string $sexo_animal;
    private array $razas_favoritas;

    public function __construct(string $espacio, int $cant_miembros, string $tipo_mascota, string $sexo_animal, array $razas_favoritas) {
        $this->espacio              = $espacio;
        $this->cant_miembros        = $cant_miembros;
        $this->tipo_mascota         = $tipo_mascota;
        $this->sexo_animal          = $sexo_animal;
        $this->razas_favoritas      = $razas_favoritas;
    }

    //GETTERS
    public function getEspacio(): string {
        return $this->espacio;
    }
    public function getCantMiembros(): int {
        return $this->cant_miembros;
    }
    public function getTipoMascota(): string {
        return $this->tipo_mascota;
    }
    public function getSexoAnimal(): string {
        return $this->sexo_animal;
    }
    public function getRazasFavoritas(): array {
        return $this->razas_favoritas;
    }

    //SETTERS
    public function setEspacio(string $espacio): void {
        $this->espacio = $espacio;
    }
    public function setCantMiembros(int $cant_miembros): void {
        $this->cant_miembros = $cant_miembros;
    }
    public function setTipoMascota(string $tipo_mascota): void {
        $this->tipo_mascota = $tipo_mascota;
    }
    public function setSexoAnimal(string $sexo_animal): void {
        $this->sexo_animal = $sexo_animal;
    }
    public function setRazasFavoritas(array $razas_favoritas): void {
        $this->razas_favoritas = $razas_favoritas;
    }
}