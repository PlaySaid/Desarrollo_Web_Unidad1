<?php

namespace infrastructure\controller;

use application\service\ArticuloService;

class ArticuloController
{
    private ArticuloService $service;

    public function __construct(ArticuloService $service)
    {
        $this->service = $service;
    }

    public function crearArticulo()
    {
        $data = $_POST;
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
        $this->service->actualizarArticulo($id, $data);
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
