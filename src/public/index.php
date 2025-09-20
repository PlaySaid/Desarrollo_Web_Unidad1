<?php

require_once __DIR__ . '/../vendor/autoload.php';

use src\infrastructure\persistence\MySQLEstudianteRepository;
use src\app\services\EstudianteService;
use src\app\controllers\EstudianteController\EstudianteController;

$pdo = new PDO(
    "mysql:host=localhost;dbname=universidad;charset=utf8", "root", ""
);


// Dependencias.
$repository = new MySQLEstudianteRepository($pdo);
$service = new EstudianteService($repository);
$controller = new EstudianteController($service);

switch ($action) {
    case 'crear':
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode($controller->crear($data));
        break;

    case 'listar':
        echo json_encode($controller->listar());
        break;

    case 'obtener':
        echo json_encode($controller->obtenerPorId((int)$_GET['id']));
        break;

    case 'actualizar':
        $data = json_decode(file_get_contents("php://input"), true);
        echo json_encode($controller->actualizar($data));
        break;

    case 'eliminar':
        echo json_encode($controller->eliminar((int)$_GET['id']));
        break;

    default:
        echo json_encode(["error" => "Acción no válida."]);

}










