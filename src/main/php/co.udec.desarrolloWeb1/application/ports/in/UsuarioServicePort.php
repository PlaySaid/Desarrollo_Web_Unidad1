<?php
namespace application\ports\in;

interface UsuarioServicePort
{
    public function crearUsuario(array $datos);
    public function obtenerUsuarioPorId(int $id);
    public function actualizarUsuario(int $id, array $datos);
    public function eliminarUsuario(int $id);
    public function listarUsuarios();
    public function iniciarSesion(string $email, string $password);
    public function cerrarSesion();
    public function recordarContrasena(string $email);
}