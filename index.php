<?php

require_once __DIR__ . "/src/main/php/co.udec.desarrolloWeb1/infrastructure/repository/ArticuloRepositoryMSSQL.php";
require_once __DIR__ . "/src/main/php/co.udec.desarrolloWeb1/application/service/ArticuloService.php";
require_once __DIR__ . "/src/main/php/co.udec.desarrolloWeb1/infrastructure/controller/ArticuloController.php";

$repo = new ArticuloRepositoryMSSQL("localhost", "DesarrolloWebUni1", "saidm", "Saidmartelo123");
$service = new ArticuloService($repo);
$controller = new ArticuloController($service);

$action = $_GET['action'] ?? null;
$id = $_GET['id'] ?? null;

switch ($action) {
    case "crear":
        $controller->crear();
        break;
    case "obtener":
        $controller->obtenerPorId($id);
        break;
    case "listar":
        $controller->listar();
        break;
    case "actualizar":
        $controller->actualizar($id);
        break;
    case "eliminar":
        $controller->eliminar($id);
        break;
    default:
        echo json_encode(["error" => "Acción no válida"]);
        break;
}