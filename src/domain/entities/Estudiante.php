<?php

namespace src\domain\entities;

use DateTime;

// Se crea la clase 'Estudiante'.
class Estudiante {
    private int $id;
    private string $nombre;
    private string $apellido;
    private DateTime $fechaNacimiento;
    private int $semestre;
    private string $email;
    private string $genero;
    private string $telefono;
    private string $programa;
    private string $universidad;


    // -- Constructores. --
    public function __construct(
        int $id,
        string $nombre,
        string $apellido,
        DateTime $fechaNacimiento,
        int $semestre,
        string $email,
        string $genero,
        string $telefono,
        string $programa,
        string $universidad
    
    )


    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->semestre = $semestre;
        $this->email = $email;
        $this->genero = $genero;
        $this->telefono = $telefono;
        $this->programa = $programa;
        $this->universidad = $universidad;
        
        // Asegura cumplir las reglas minimas.         
        $this->validar();

    }


    // Reglas basicas de validación del 'dominio'.
    private function validar(): void{
        if ($this->semestre < 1) {
            throw new \InvalidArgumentException("El semestre debe ser mayor o igual a 1.");
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            throw new \InvalidArgumentException("El correo electronico no es válido.");
        }

        if (strlen($this->telefono) < 7) {
            throw new \InvalidArgumentException("El teléfono debe tener al menos 7 digitos.");

        }

    }


    # -- Getters. --
    public function getId(): int{
        return $this->id;
    }

    public function getNombre(): string{
        return $this->nombre;
    }

    public function getApellido(): string{
        return $this->apellido;
    }

    public function getFechaNacimiento(): DateTime{
        return $this->fechaNacimiento;
    }

    public function getSemestre(): int{
        return $this->semestre;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function getGenero(): string{
        return $this->genero;
    }

    public function getTelefono(): string{
        return $this->telefono;
    }

    public function getPrograma(): string{
        return $this->programa;
    }

    public function getUniversidad(): string{
        return $this->universidad;
    }


    // Setters
    public function setSemestre(int $semestre): void{
        if ($semestre < 1) {
            throw new \InvalidArgumentException("El semestre debe ser mayor o igual a 1.");
        }

        $this->semestre = $semestre;

    }

    public function setEmail(string $email): void{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new \InvalidArgumentException("El correo electronico no es válido.");
        }
        
        $this->email = $email;

    }

    public function setTelefono(string $telefono): void{
        if (strlen($telefono) < 7){
            throw new \InvalidArgumentException("El teléfono debe tener al menos 7 digitos.");
        }

        $this->telefono = $telefono;

    }

}
