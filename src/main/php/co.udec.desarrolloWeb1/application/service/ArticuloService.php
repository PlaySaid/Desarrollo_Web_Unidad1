<?php

namespace application\service;

use domain\Articulo;
use application\ports\in\ArticuloServicePort;
use application\ports\out\ArticuloRepositoryPort;

// servicio de aplicacion para articulo
class ArticuloService implements ArticuloServicePort {

    private ArticuloRepositoryPort $articuloRepository;

    // inyeccion de dependencia de repositorio
    public function __construct(ArticuloRepositoryPort $articuloRepository) {
        $this->articuloRepository = $articuloRepository;
    }

    // crear articulo
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

    // actualizar articulo
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

    // eliminar articulo
    public function eliminarArticulo(int $id) {
        return $this->articuloRepository->eliminar($id);
    }

    // obtener articulo por id
    public function obtenerArticuloPorId(int $id) {
        return $this->articuloRepository->buscarPorId($id);
    }

    // listar articulos
    public function listarArticulos() {
        return $this->articuloRepository->listar();
    }
}
