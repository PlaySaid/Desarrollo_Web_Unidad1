<?php

namespace src\app\services;

use src\domain\entities\Estudiante;
use src\domain\repositories\EstudianteRepository;

class EstudianteService{
    private EstudianteRepository $repository;
    
    public function __construct(EstudianteRepository $repository){
        $this->repository = $repository;
    }

    public function registrarEstudiante(Estudiante $estudiante): void{
        $this->repository->save($estudiante);
    }

    public function obtenerEstudiantePorId(int $id): ?Estudiante{
        return $this->repository->findById($id);
    }

    public function listarEstudiantes(): array{
        return $this->repository->findAll();
    }

    public function actualizarEstudiante(Estudiante $estudiante): void{
        $this->repository->update($estudiante);
    }

    public function eliminarEstudiante(int $id): void{
        $this->repository->delete($id);
    }

}