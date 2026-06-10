<?php
class Contacto
{
    private int $id;
    private string $nombre;
    private string $email;
    private string $telefono;
    private string $asunto;
    private string $mensaje;

    public function __construct(
        int $id,
        string $nombre,
        string $email,
        string $telefono,
        string $asunto,
        string $mensaje
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->asunto = $asunto;
        $this->mensaje = $mensaje;
        }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getTelefono(): string
    {
        return $this->telefono;
    }
    public function getAsunto(): string
    {
        return $this->asunto;
    }
    public function getMensaje(): string
    {
        return $this->mensaje;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function setAsunto(string $asunto): void
    {
        $this->asunto = $asunto;
    }

    public function setMensaje(string $mensaje): void
    {
        $this->mensaje = $mensaje;
    }

}