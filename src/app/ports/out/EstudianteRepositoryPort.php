<?php

namespace src\app\ports\out;

use src\domain\entities\Estudiante;

interface EstudianteRepositoryPort
{
    public function save(Estudiante $estudiante): void;

    public function findById(int $id): ?Estudiante;
    
    public function findAll(): array;
    
    public function update(Estudiante $estudiante): void;
    
    public function delete(int $id): void;
    
}
