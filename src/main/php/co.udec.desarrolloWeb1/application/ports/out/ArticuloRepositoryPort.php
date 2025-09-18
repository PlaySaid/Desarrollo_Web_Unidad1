<?php

use domain\Articulo;

interface ArticuloRepositoryPort {
    public function guardar(Articulo $articulo);
    public function buscarPorId(int $id): ?Articulo;
    public function actualizar(int $id, Articulo $articulo);
    public function eliminar(int $id);
    public function listar(): array;
}