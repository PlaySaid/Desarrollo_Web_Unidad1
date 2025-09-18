<?php

namespace infrastructure\repository;
use PDO;
use PDOException;

require_once __DIR__ . "/../../domain/Articulo.php";
require_once __DIR__ . "/../../application/ports/out/ArticuloRepositoryPort.php";

class ArticuloRepositoryMSSQL
{
    private $conn;

    public function __construct($host, $db, $usuario, $contrasena)
    {
        try {
            $this->conn = new PDO("sqlsrv:Server=$host;Database=$db", $usuario, $contrasena);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexion: " . $e->getMessage());
        }
    }
}