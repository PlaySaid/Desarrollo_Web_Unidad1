<?php

namespace infrastructure\repository;

use application\ports\out\UsuarioRepositoryPort;
use domain\Usuario;
use PDO;

class UsuarioRepositoryMySQL implements UsuarioRepositoryPort
{
    private PDO $conn;

    public function __construct($host, $db, $usuario, $contrasena)
    {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usuario, $contrasena);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function guardar(Usuario $usuario)
    {
        $sql = "INSERT INTO Usuarios (nombre, email, password, rol) VALUES (:nombre, :email, :password, :rol)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':nombre' => $usuario->getNombre(),
            ':email' => $usuario->getEmail(),
            ':password' => $usuario->getPassword(),
            ':rol' => $usuario->getRol()
        ]);
        // Retornar el objeto Usuario con el ID generado por la BD
        $id = (int)$this->conn->lastInsertId();
        return new Usuario($id, $usuario->getNombre(), $usuario->getEmail(), $usuario->getPassword(), $usuario->getRol());
    }

    public function actualizar(int $id, Usuario $usuario)
    {
        $sql = "UPDATE Usuarios SET nombre = :nombre, email = :email, password = :password, rol = :rol WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':nombre' => $usuario->getNombre(),
            ':email' => $usuario->getEmail(),
            ':password' => $usuario->getPassword(),
            ':rol' => $usuario->getRol()
        ]);
    }

    public function eliminar(int $id)
    {
        $sql = "DELETE FROM Usuarios WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function buscarPorId(int $id): ?Usuario
    {
        $stmt = $this->conn->prepare("SELECT * FROM Usuarios WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;
        return new Usuario($row['id'], $row['nombre'], $row['email'], $row['password'], $row['rol']);
    }

    public function listar(): array
    {
        $stmt = $this->conn->query("SELECT * FROM Usuarios");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $usuarios = [];
        foreach ($rows as $row) {
            $usuarios[] = new Usuario($row['id'], $row['nombre'], $row['email'], $row['password'], $row['rol']);
        }
        return $usuarios;
    }

    public function buscarPorEmail(string $email): ?Usuario
    {
        $stmt = $this->conn->prepare("SELECT * FROM Usuarios WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;
        return new Usuario($row['id'], $row['nombre'], $row['email'], $row['password'], $row['rol']);
    }
}
