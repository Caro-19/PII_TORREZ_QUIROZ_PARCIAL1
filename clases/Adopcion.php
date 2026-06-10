<?php
// La clase Adopcion representa una solicitud de adopción de un animal en la sección de adopciones.
class Adopcion
{
    private int $id;
    private Animal $idAnimal;
    private string $nombreAdoptante;
    private string $email;
    private string $telefono;
    private string $motivo;

    public function __construct(
        int $id,
        Animal $idAnimal,
        string $nombreAdoptante,
        string $email,
        string $telefono,
        string $motivo
    ) {
        $this->id = $id;
        $this->idAnimal = $idAnimal;
        $this->nombreAdoptante = $nombreAdoptante;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->motivo = $motivo;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getIdAnimal(): Animal
    {
        return $this->idAnimal;
    }
    public function getNombreAdoptante(): string
    {
        return $this->nombreAdoptante;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getTelefono(): string
    {
        return $this->telefono;
    }
    public function getMotivo(): string
    {
        return $this->motivo;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setIdAnimal(Animal $idAnimal): void
    {
        $this->idAnimal = $idAnimal;
    }
    public function setNombreAdoptante(string $nombre): void
    {
        $this->nombreAdoptante = $nombre;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }
    public function setMotivo(string $motivo): void
    {
        $this->motivo = $motivo;
    }
}
