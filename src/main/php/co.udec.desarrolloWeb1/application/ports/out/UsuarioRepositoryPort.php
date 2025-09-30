<?php
namespace application\ports\out;

use domain\Usuario;

interface UsuarioRepositoryPort
{
    public function guardar(Usuario $usuario);
    public function buscarPorId(int $id): ?Usuario;
    public function actualizar(int $id, Usuario $usuario);
    public function eliminar(int $id);
    public function listar(): array;
    public function buscarPorEmail(string $email): ?Usuario;
}
