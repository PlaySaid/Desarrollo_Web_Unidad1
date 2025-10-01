<?php

require_once __DIR__ . '/src/main/php/co.udec.desarrolloWeb1/domain/Usuario.php';
require_once __DIR__ . '/src/main/php/co.udec.desarrolloWeb1/application/ports/in/UsuarioServicePort.php';
require_once __DIR__ . '/src/main/php/co.udec.desarrolloWeb1/application/ports/out/UsuarioRepositoryPort.php';
require_once __DIR__ . '/src/main/php/co.udec.desarrolloWeb1/application/service/UsuarioService.php';
require_once __DIR__ . '/src/main/php/co.udec.desarrolloWeb1/infrastructure/repository/UsuarioRepositoryMySQL.php';
require_once __DIR__ . '/src/main/php/co.udec.desarrolloWeb1/infrastructure/controller/UsuarioController.php';


use infrastructure\controller\UsuarioController;
use infrastructure\repository\UsuarioRepositoryMySQL;
use application\service\UsuarioService;

$repo = new UsuarioRepositoryMySQL('localhost','desarrollowebuni1','root','');
$service = new UsuarioService($repo);
$controller = new UsuarioController($service);

$action = $_GET['action'] ?? 'login';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

switch($action) {
    case 'crear':
        $controller->crearUsuario();
        break;
    case 'editar':
        if($id) $controller->actualizarUsuario($id);
        break;
    case 'listar':
        $controller->listarUsuarios();
        break;
    case 'login':
        $controller->iniciarSesion();
        break;
    case 'logout':
        $controller->cerrarSesion();
        break;
    case 'recordar':
        $controller->recordarContrasena();
        break;
    default:
        echo "Acción no válida";
}
