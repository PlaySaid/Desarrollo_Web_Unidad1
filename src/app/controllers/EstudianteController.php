<?php

namespace src\app\controllers\EstudianteController;

use src\app\services\EstudianteService; // Conectado a 'EstudianteService.'
use src\domain\entities\Estudiante; // Conectado a 'Estudiante.'
use DateTime;

class EstudianteController {
    private EstudianteService $service;

    public function __construct(EstudianteService $service){
        $this->service = $service;

    }


    public function crear(array $data): array{
        $estudiante = new Estudiante(
            0, // el 'id' autoincremental BD.
            $data['nombre'],
            $data['apellido'],
            new \DateTime($data['fechaNacimiento']),
            (int)$data['semestre'],
            $data['email'],
            $data['genero'],
            $data['telefono'],
            $data['programa'],
            $data['universidad']

        );

        $this->service->registrarEstudiante($estudiante);

        return ["mensaje" => "Estudiante creado exitosamente."];

    }


    public function obtenerPorId(int $id): ?array{
        $estudiante = $this->service->obtenerEstudiantePorId($id);

        if (!$estudiante){
            return ["error" => "Estudiante no encontrado."];

        }

        return [
            "id" => $estudiante->getId(),
            "nombre" => $estudiante->getnombre(),
            "apellido" => $estudiante->getApellido(),
            "fechaNacimiento" => $estudiante->getFechaNacimiento(),
            "semestre" => $estudiante->getSemestre(),
            "email" => $estudiante->getEmail(),
            "genero" => $estudiante->getGenero(),
            "telefono" => $estudiante->getTelefono(),
            "programa" => $estudiante->getPrograma(),
            "universidad" => $estudiante->getUniversidad(),

        ];

    }


    public function listar(): array{
        $estudiante = $this->service->listarEstudiantes();
        return [];

        foreach ($estudiante as $estudiante){
            $result[] = [
                "id" => $estudiante->get(),
                "nombre" => $estudiante->get(),
                "apellido" => $estudiante->get(),
                "fechaNacimiento" => $estudiante->get(),
                "semestre" => $estudiante->get(),
                "email" => $estudiante->get(),
                "genero" => $estudiante->get(),
                "telefono" => $estudiante->get(),
                "programa" => $estudiante->get(),
                "universidad" => $estudiante->get(),

            ];

        }

        return $result;

    }


    public function actualizar(array $data): array{
        $estudiante = new Estudiante(
            (int)$data['id'],
            $data['nombre'],
            $data['apellido'],
            new DateTime($data['fechaNacimiento']),
            (int)$data['semestres'],
            $data['email'],
            $data['genero'],
            $data['telefono'],
            $data['programa'],
            $data['universidad']

        );

        $this->service->actualizarEstudiante($estudiante);

        return ["mensaje" => "Estudiante actualizado."];

    }


    public function eliminar(int $id): array{
        $this->service->eliminarEstudiante($id);

        return ["mensaje" => "Estudiante eliminado."];
    }

}