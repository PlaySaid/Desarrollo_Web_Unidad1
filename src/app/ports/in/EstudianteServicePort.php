<?php

namespace src\app\ports\in;

use src\domain\entities\Estudiante;

interface EstudianteServicePort
{
    public function registrarEstudiante(Estudiante $estudiante): void;
    
    public function obtenerEstudiantePorId(int $id): ?Estudiante;
    
    public function listarEstudiante(): array;
    
    public function actualizarEstudiante(Estudiante $estudiante): void;
    
    public function eliminarEstudiante(int $id): void;

}
