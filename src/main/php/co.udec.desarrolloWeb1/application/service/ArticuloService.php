<?php

use domain\Articulo;

require_once __DIR__ . "/../ports/in/ArticuloServicePort.php";
require_once __DIR__ . "/../ports/out/ArticuloRepositoryPort.php";
require_once __DIR__ . "/../../domain/Articulo.php";

class ArticuloService implements ArticuloServicePort {

    private ArticuloRepositoryPort $articuloRepository;

    public function __construct(ArticuloRepositoryPort $articuloRepository) {
        $this->articuloRepository = $articuloRepository;
    }
    public function crearArticulo(array $data) {
        $articulo = new Articulo(
            $data['marca'],
            $data['precioVenta'],
            $data['precioCompra'],
            $data['iva'],
            $data['modelo'],
            $data['proveedor'],
            $data['tienda'],
            $data['cantidad'],
            $data['descripcion'],
            $data['categoria']
        );

        return $this->articuloRepository->guardar($articulo);
    }

    public function actualizarArticulo(int $id, array $data) {
        $articulo = new Articulo(
            $data['marca'],
            $data['precioVenta'],
            $data['precioCompra'],
            $data['iva'],
            $data['modelo'],
            $data['proveedor'],
            $data['tienda'],
            $data['cantidad'],
            $data['descripcion'],
            $data['categoria']
        );

        return $this->articuloRepository->actualizar($id, $articulo);
    }
    public function eliminarArticulo(int $id) {
        return $this->articuloRepository->eliminar($id);
    }

    public function obtenerArticuloPorId(int $id) {
        return $this->articuloRepository->buscarPorId($id);
    }

    public function listarArticulos() {
        return $this->articuloRepository->listar();
    }
}