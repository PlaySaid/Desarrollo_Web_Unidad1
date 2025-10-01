<?php
namespace domain;

class Usuario
{
    private int $id;
    private string $nombre;
    private string $email;
    private string $password;
    private string $rol;

    public function __construct(int $id, string $nombre, string $email, string $password, string $rol)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    // getters
    public function getId(): int { return $this->id; }
    public function getNombre(): string { return $this->nombre; }
    public function getEmail(): string { return $this->email; }
    public function getPassword(): string { return $this->password; }
    public function getRol(): string { return $this->rol; }
}
