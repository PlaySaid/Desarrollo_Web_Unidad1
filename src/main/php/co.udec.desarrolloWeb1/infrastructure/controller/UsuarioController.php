<?php

namespace infrastructure\controller;

use application\service\UsuarioService;



class UsuarioController
{
    private UsuarioService $service;

    public function __construct(UsuarioService $service)
    {
        $this->service = $service;
    }

    public function crearUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            $this->service->crearUsuario($_POST);
            header("Location: index.php?action=listarUsuarios");
            exit;
        }
    }

    public function actualizarUsuario($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            $this->service->actualizarUsuario($id, $_POST);
            echo json_encode(["message" => "Usuario actualizado"]);
        }
    }

    public function eliminarUsuario($id)
    {
        $this->service->eliminarUsuario($id);
        echo json_encode(["message" => "Usuario eliminado"]);
    }

    public function obtenerUsuarioPorId($id)
    {
        $usuario = $this->service->obtenerUsuarioPorId($id);
        if ($usuario) {
            echo json_encode([
                "nombre" => $usuario->getNombre(),
                "email" => $usuario->getEmail(),
                "rol" => $usuario->getRol()
            ]);
        } else {
            echo json_encode(["error" => "Usuario no encontrado"]);
        }
    }

    public function listarUsuarios()
    {
        $usuarios = $this->service->listarUsuarios();
        $data = [];
        foreach ($usuarios as $usuario) {
            $data[] = [
                "nombre" => $usuario->getNombre(),
                "email" => $usuario->getEmail(),
                "rol" => $usuario->getRol()
            ];
        }
        echo json_encode($data);
    }

    public function iniciarSesion()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($this->service->iniciarSesion($email, $password)) {
                echo json_encode(["message" => "Sesión iniciada"]);
            } else {
                echo json_encode(["error" => "Credenciales incorrectas"]);
            }
        }
    }

    public function cerrarSesion()
    {
        $this->service->cerrarSesion();
        echo json_encode(["message" => "Sesión cerrada"]);
    }

    public function recordarContrasena()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $token = $this->service->recordarContrasena($email);
            if ($token) {
                echo json_encode(["message" => "Token generado", "token" => $token]);
            } else {
                echo json_encode(["error" => "Usuario no encontrado"]);
            }
        }
    }
}
