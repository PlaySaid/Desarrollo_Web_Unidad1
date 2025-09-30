<?php
namespace domain;

class Usuario
{
    private string $nombre;
    private string $email;
    private string $password;
    private string $rol;

    public function __construct(string $nombre, string $email, string $password, string $rol)
    {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    // getters
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getRol(): string
    {
        return $this->rol;
    }
}
