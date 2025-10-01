<?php
namespace application\service;

use application\ports\in\UsuarioServicePort;
use application\ports\out\UsuarioRepositoryPort;
use domain\Usuario;

class UsuarioService implements UsuarioServicePort
{
    private UsuarioRepositoryPort $usuarioRepository;

    public function __construct(UsuarioRepositoryPort $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
        if (session_status() == PHP_SESSION_NONE) session_start();
    }

    public function crearUsuario(array $datos)
    {
        $usuario = new Usuario(0, $datos['nombre'], $datos['email'], password_hash($datos['password'], PASSWORD_DEFAULT), $datos['rol']);
        return $this->usuarioRepository->guardar($usuario);
    }

    public function actualizarUsuario(int $id, array $datos)
    {
        $usuarioActual = $this->usuarioRepository->buscarPorId($id);
        if (!$usuarioActual) return false;

        $password = !empty($datos['password']) ? password_hash($datos['password'], PASSWORD_DEFAULT) : $usuarioActual->getPassword();

        $usuario = new Usuario($id, $datos['nombre'], $datos['email'], $password, $datos['rol']);
        return $this->usuarioRepository->actualizar($id, $usuario);
    }

    public function obtenerUsuarioPorId(int $id)
    {
        return $this->usuarioRepository->buscarPorId($id);
    }

    public function eliminarUsuario(int $id)
    {
        return $this->usuarioRepository->eliminar($id);
    }

    public function listarUsuarios()
    {
        return $this->usuarioRepository->listar();
    }

    public function iniciarSesion(string $email, string $password)
    {
        $usuario = $this->usuarioRepository->buscarPorEmail($email);
        if ($usuario && password_verify($password, $usuario->getPassword())) {
            $_SESSION['usuario_id'] = $usuario->getId();
            $_SESSION['usuario_nombre'] = $usuario->getNombre();
            return true;
        }
        return false;
    }

    public function cerrarSesion()
    {
        session_unset();
        session_destroy();
    }

    public function recordarContrasena(string $email)
    {
        $usuario = $this->usuarioRepository->buscarPorEmail($email);
        if (!$usuario) return false;

        $token = bin2hex(random_bytes(16));
        $_SESSION['token_de_recuperacion'] = $token;
        $_SESSION['usuario_email'] = $email;

        return $token;
    }
}
