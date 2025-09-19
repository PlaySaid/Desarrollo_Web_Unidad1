<?php

namespace application\ports\in;


interface ArticuloServicePort
{
    public function crearArticulo(array $datos);
    public function obtenerArticuloPorId(int $id);
    public function actualizarArticulo(int $id, array $datos);
    public function eliminarArticulo(int $id);
    public function listarArticulos();
}