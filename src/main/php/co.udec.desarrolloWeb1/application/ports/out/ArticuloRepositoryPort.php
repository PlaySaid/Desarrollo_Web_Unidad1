<?php

namespace application\ports\out;

use domain\Articulo;

// puerto de salida para persistencia de articulo
interface ArticuloRepositoryPort {
    // guardar articulo
    public function guardar(Articulo $articulo);

    // buscar articulo por id
    public function buscarPorId(int $id): ?Articulo;

    // actualizar articulo
    public function actualizar(int $id, Articulo $articulo);

    // eliminar articulo
    public function eliminar(int $id);

    // listar articulos
    public function listar(): array;
}
