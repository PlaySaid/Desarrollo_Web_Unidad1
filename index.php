<?php

require_once __DIR__ . "/src/main/php/co.udec.desarrolloWeb1/application/ports/in/ArticuloServicePort.php";
require_once __DIR__ . "/src/main/php/co.udec.desarrolloWeb1/application/ports/out/ArticuloRepositoryPort.php";
require_once __DIR__ . "/src/main/php/co.udec.desarrolloWeb1/domain/Articulo.php";
require_once __DIR__ . "/src/main/php/co.udec.desarrolloWeb1/application/service/ArticuloService.php";
require_once __DIR__ . "/src/main/php/co.udec.desarrolloWeb1/infrastructure/repository/ArticuloRepositoryMySQL.php";
require_once __DIR__ . "/src/main/php/co.udec.desarrolloWeb1/infrastructure/controller/ArticuloController.php";


use infrastructure\controller\ArticuloController;
use infrastructure\repository\ArticuloRepositoryMySQL;
use application\service\ArticuloService;

$repo = new ArticuloRepositoryMySQL("localhost", "DesarrolloWebUni1", "root", "");

$service = new ArticuloService($repo);
$controller = new ArticuloController($service);

$action = $_GET['action'] ?? null;
$id = $_GET['id'] ?? null;

switch ($action) {
    case "formCrear":
        include __DIR__ . "/src/main/php/co.udec.desarrolloWeb1/infrastructure/view/productoView/crear.php";
        break;
    case "crear":
        $controller->crearArticulo();
        break;
    case "obtener":
        $controller->obtenerPorId($id);
        break;
    case "listar":
        $controller->listarArticulos();
        break;
    case "actualizar":
        $controller->actualizarArticulo($id);
        break;
    case "formEditar":
        $controller->mostrarFormularioEditar($id);
        break;

    case "eliminar":
        $controller->eliminarArticulo($id);
        break;
    default:
        echo json_encode(["error" => "Acción no válida"]);
        break;
}