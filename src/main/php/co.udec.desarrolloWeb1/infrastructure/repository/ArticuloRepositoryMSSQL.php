<?php

namespace infrastructure\repository;

use domain\Articulo;
use application\ports\out\ArticuloRepositoryPort;
use PDO;
use PDOException;

class ArticuloRepositoryMSSQL implements ArticuloRepositoryPort
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

    public function guardar(Articulo $articulo)
    {
        $sql = "INSERT INTO Articulos (marca, precioVenta, precioCompra, iva, modelo, proveedor, tienda, cantidad, descripcion, categoria) 
                VALUES (:marca, :precioVenta, :precioCompra, :iva, :modelo, :proveedor, :tienda, :cantidad, :descripcion, :categoria)";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':marca' => $articulo->getMarca(),
            ':precioVenta' => $articulo->getPrecioVenta(),
            ':precioCompra' => $articulo->getPrecioCompra(),
            ':iva' => $articulo->getIva(),
            ':modelo' => $articulo->getModelo(),
            ':proveedor' => $articulo->getProveedor(),
            ':tienda' => $articulo->getTienda(),
            ':cantidad' => $articulo->getCantidad(),
            ':descripcion' => $articulo->getDescripcion(),
            ':categoria' => $articulo->getCategoria()
        ]);
    }

    public function actualizar(int $id, Articulo $articulo)
    {
        $sql = "UPDATE Articulos 
                   SET marca = :marca, 
                       precioVenta = :precioVenta, 
                       precioCompra = :precioCompra, 
                       iva = :iva, 
                       modelo = :modelo, 
                       proveedor = :proveedor, 
                       tienda = :tienda, 
                       cantidad = :cantidad, 
                       descripcion = :descripcion, 
                       categoria = :categoria 
                 WHERE id = :id";
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':id'           => $id,
            ':marca'        => $articulo->getMarca(),
            ':precioVenta'  => $articulo->getPrecioVenta(),
            ':precioCompra' => $articulo->getPrecioCompra(),
            ':iva'          => $articulo->getIva(),
            ':modelo'       => $articulo->getModelo(),
            ':proveedor'    => $articulo->getProveedor(),
            ':tienda'       => $articulo->getTienda(),
            ':cantidad'     => $articulo->getCantidad(),
            ':descripcion'  => $articulo->getDescripcion(),
            ':categoria'    => $articulo->getCategoria()
        ]);
    }

    public function eliminar(int $id) {
        $sql = "DELETE FROM Articulos WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function buscarPorId(int $id): ?Articulo {
        $sql = "SELECT * FROM Articulos WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new Articulo(
            $row['marca'],
            $row['precioVenta'],
            $row['precioCompra'],
            $row['iva'],
            $row['modelo'],
            $row['proveedor'],
            $row['tienda'],
            $row['cantidad'],
            $row['descripcion'],
            $row['categoria']
        );
    }

    public function listar(): array {
        $sql = "SELECT * FROM Articulos";
        $stmt = $this->conn->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $articulos = [];
        foreach ($rows as $row) {
            $articulos[] = new Articulo(
                $row['marca'],
                $row['precioVenta'],
                $row['precioCompra'],
                $row['iva'],
                $row['modelo'],
                $row['proveedor'],
                $row['tienda'],
                $row['cantidad'],
                $row['descripcion'],
                $row['categoria']
            );
        }

        return $articulos;
    }
}
