<?php

namespace application\ports\in;

// puerto de entrada para casos de uso de articulo
interface ArticuloServicePort
{
    // crear articulo
    public function crearArticulo(array $datos);

    // obtener articulo por id
    public function obtenerArticuloPorId(int $id);

    // actualizar articulo
    public function actualizarArticulo(int $id, array $datos);

    // eliminar articulo
    public function eliminarArticulo(int $id);

    // listar articulos
    public function listarArticulos();
}
