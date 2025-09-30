<?php

namespace application\service;

use application\ports\in\UsuarioServicePort;
use application\ports\out\UsuarioRepositoryPort;
use domain\Usuario;

class UsuarioService implements UsuarioServicePort
{

    // Crea una instancia usuarioRepository
    private UsuarioRepositoryPort $usuarioRepository;


    // Constructor
    public function __construct(UsuarioRepositoryPort $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
        if (session_status() == PHP_SESSION_NONE) session_start(); // Linea de codigo que confirma si la sesion esta iniciada, si no, la inicia
    }


    // Metodo para crera usuario
    public function crearUsuario(array $datos)
    {

        // Se usa password_hash para que la contrasena se guarde como algo mas seguro, tipo encriptado, y PASSWORD_DEFAULT es el tipo de algoritmo
        // hash a utilizar, normalmente usa el mas seguro

        $usuario = new Usuario($datos['nombre'], $datos['email'], password_hash($datos['password'], PASSWORD_DEFAULT), $datos['rol']);
        return this->usuarioRepository->guardar($usuario);
    }


    // Metodo para actualizar un usuario buscando por su ID
    public function actualizarUsuario(int $id, array $datos)
    {
        $usuario = new Usuario($datos['nombre'], $datos['email'], password_hash($datos['password'], PASSWORD_DEFAULT), $datos['rol']);
        return $this->usuarioRepository->actualizar($id, $usuario);
    }


    // Obtiene un usuario buscando por su id
    public function obtenerUsuarioPorId(int $id)
    {
        return $this->usuarioRepository->buscarPorId($id);
    }

    // Elimina un usuario por su id
    public function eliminarUsuario(int $id)
    {
        return $this->usuarioRepository->eliminar($id);
    }

    // Muestra todos los usuarios de la base de datos
    public function listarUsuarios()
    {
        return $this->usuarioRepository->listar();
    }


    // Metodo para iniciar sesion, el usuario ingresa su email y contrasena, el sistema busca el usuarioen la bd,
    // y si el correo y contrasena coinciden, se guarda con $_SESSION el correo y usuario
    public function iniciarSesion(string $email, string $password)
    {
        $usuario = $this->usuarioRepository->buscarPorEmail($email);
        if (usuario && password_verify($password, $usuario->getPassword())) {
            $_SESSION['usuario_id'] = $usuario->getEmail();
            $_SESSION['usuario_nombre'] = $usuario->getnombre();;
            return true;
        }
        return false;
    }

    // Cierra la sesion
    public function cerrarSesion()
    {
        session_unset();
        session_destroy();
    }

    // Meotodo para recordar la contrasena
    public function recordarContrasena(string $email)
    {
        $usuario = $this->usuarioRepository->buscarPorEmail($email);
        if (!$usuario) return false;


        //Genera 16 bytes aleatorios y bin2hex los convierte en hexadecimal de 32 caracteres
        // luego verifica que el token y el email coincidan dentro de la misma sesion
        $token = bin2hex(random_bytes(16));
        $_SESSION['token_de_recuperacion'] = $token;
        $_SESSION['usuario_email'] = email;

        return token;
    }
}