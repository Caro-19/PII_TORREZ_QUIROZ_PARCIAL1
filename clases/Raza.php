<?php
class Raza{
    private string $nombre_raza;
    private string $tamanio;
    private string $tipo_pelaje;
    private string $nivel_energia;
    private string $temperamento;
    private string $frecuencia_aseo;

    public function __construct(string $nombre_raza, string $tamanio, string $tipo_pelaje, string $nivel_energia, string $temperamento, string $frecuencia_aseo) {
        $this->nombre_raza = $nombre_raza;
        $this->tamanio = $tamanio;
        $this->tipo_pelaje = $tipo_pelaje;
        $this->nivel_energia = $nivel_energia;
        $this->temperamento = $temperamento;
        $this->frecuencia_aseo = $frecuencia_aseo;
    }

    //GETTERS
    public function getNombreRaza(): string {
        return $this->nombre_raza;
    }
    public function getTamanio(): string {
        return $this->tamanio;
    }
    public function getTipoPelaje(): string {
        return $this->tipo_pelaje;
    }
    public function getNivelEnergia(): string {
        return $this->nivel_energia;
    }
    public function getTemperamento(): string {
        return $this->temperamento;
    }
    public function getFrecuenciaAseo(): string {
        return $this->frecuencia_aseo;
    }

    //SETTERS
    public function setNombreRaza(string $nombre_raza): void {
        $this->nombre_raza = $nombre_raza;
    }
    public function setTamanio(string $tamanio): void {
        $this->tamanio = $tamanio;
    }
    public function setTipoPelaje(string $tipo_pelaje): void {
        $this->tipo_pelaje = $tipo_pelaje;
    }
    public function setNivelEnergia(string $nivel_energia): void {
        $this->nivel_energia = $nivel_energia;
    }
    public function setTemperamento(string $temperamento): void {
        $this->temperamento = $temperamento;
    }
    public function setFrecuenciaAseo(string $frecuencia_aseo): void {
        $this->frecuencia_aseo = $frecuencia_aseo;
    }
    
}
