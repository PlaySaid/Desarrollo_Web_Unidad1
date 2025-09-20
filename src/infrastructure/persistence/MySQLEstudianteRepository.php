<?php

namespace src\infrastructure\persistence;

use src\domain\entities\Estudiante;
use src\domain\repositories\EstudianteRepository;
use PDO;

class MySQLEstudianteRepository implements EstudianteRepository{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;   
    }

    public function save(Estudiante $estudiante): void{
        $stmt = $this->connection->prepare(
            "INSERT INTO estudiante (nombre, apellido, fecha_nacimiento, semestre, email, genero, telefono, programa, universidad)
            VALUES (:nombre, :apellido, :fechaNacimiento, :semestre, :email, :genero, :telefono, :programa, :universidad)"
        );

        $stmt->execute([
            ':nombre' => $estudiante->getNombre(),
            ':apellido' => $estudiante->getApellido(),
            ':fechaNacimiento' => $estudiante->getFechaNacimiento()->format('Y-m-d'),
            ':semestre' => $estudiante->getSemestre(),
            ':email' => $estudiante->getEmail(),
            ':genero' => $estudiante->getGenero(),
            ':telefono' => $estudiante->getTelefono(),                
            ':programa' => $estudiante->getPrograma(),
            ':universidad' => $estudiante->getUniversidad()

        ]);

    }

    public function findById(int $id): ?Estudiante
    {
        $stmt = $this->connection->prepare( "SELECT * FROM estudiante WHERE id = :id" );
        $stmt->execute([
            ':id' => $id
        ]);
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data){
            return null;
        }


        return new Estudiante(
            (int)$data['id'],
            $data['nombre'],
            $data['apellido'],
            new \DateTime($data['fecha_nacimiento']),
            (int)$data['semestre'],
            $data['email'],
            $data['genero'],
            $data['telefono'],
            $data['programa'],
            $data['universidad']

        );
    }

    public function findAll(): array
    {
        $stmt = $this->connection->query("SELECT * FROM estudiante");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $estudiante = [];
        foreach ($rows as $data){
            $estudiante[] = new Estudiante(
                (int)$data['id'],
                $data['nombre'],
                $data['apellido'],
                new \DateTime($data['fecha_nacimiento']),
                (int)$data['semestre'],
                $data['email'],
                $data['genero'],
                $data['telefono'],
                $data['programa'],
                $data['universidad'],

            );
        }
        return $estudiante;

    }


    public function update(Estudiante $estudiante): void
    {
        $stmt = $this->connection->prepare("
            UPDATE estudiante
            SET nombre = :nombre, 
                apellido = :apellido, 
                fecha_nacimiento = :fecha_nacimiento,
                semestre = :semestre,
                email = :email,
                genero = :genero,
                telefono = :telefono,
                programa = :programa,
                universidad = :universidad 
            WHERE id = :id

        ");

        $stmt->execute([
            ':id' => $estudiante->getId(),
            ':nombre' => $estudiante->getNombre(),
            ':apellido' => $estudiante->getApellido(),
            ':fecha_nacimiento' => $estudiante->getFechaNacimiento()->format('Y-m-d'),
            ':semestre' => $estudiante->getSemestre(),
            ':email' => $estudiante->getEmail(),
            ':genero' => $estudiante->getGenero(),
            ':telefono' => $estudiante->getTelefono(),
            ':programa' => $estudiante->getPrograma(),
            ':universidad' => $estudiante->getUniversidad(),  

        ]);

    }    


    public function delete(int $id): void{
        $stmt = $this->connection->prepare("DELETE FROM estudiante WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }

}