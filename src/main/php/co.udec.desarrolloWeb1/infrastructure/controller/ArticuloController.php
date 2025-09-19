<?php

namespace infrastructure\controller;

use ArticuloService;

require_once __DIR__ . "/../../application/service/ArticuloService.php";

class ArticuloController
{
private ArticuloService $articuloService;

    public function __construct(ArticuloService $service)
    {
        $this->service = $service;
    }
    public function crearArticulo()
    {
        $data = $_POST; // Lo que hace es recibir datos del formulario/Json
        $this->service->crearArticulo($data);
        echo json_encode(["message" => "Articulo creado"]);
    }
    public function obtenerPorId($id)
    {
        $articulo = $this->service->obtenerArticuloPorId($id);
        echo json_encode($articulo);
    }
    public function actualizarArticulo($id)
    {
        $data = $_POST;
        $articulo = $this->service->actualizarArticulo($id, $data);
        echo json_encode(["message" => "Articulo actualizado"]);
    }
    public function eliminarArticulo($id)
    {
        $this->service->eliminarArticulo($id);
        echo json_encode(["message" => "Articulo eliminado"]);
    }
    public function listarArticulos() {
        $articulos = $this->service->listarArticulos();
        echo json_encode($articulos);
    }
}