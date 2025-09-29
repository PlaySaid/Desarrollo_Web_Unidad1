<?php

namespace infrastructure\controller;

use application\service\ArticuloService;

class ArticuloController
{
    // inyeccion de servicio
    private ArticuloService $service;

    public function __construct(ArticuloService $service)
    {
        $this->service = $service;
    }

    // crear articulo desde post
    public function crearArticulo()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
        $data = $_POST;
        $this->service->crearArticulo($data);
        header("Location: index.php?action=listar");
        exit;
    } else {
        echo "⚠️ No llegaron datos en POST. Verifica el formulario.";
    }
}

    // obtener articulo por id
    public function obtenerPorId($id)
    {
        $articulo = $this->service->obtenerArticuloPorId($id);

        if ($articulo) {
            $data = [
                "marca"        => $articulo->getMarca(),
                "precioVenta"  => $articulo->getPrecioVenta(),
                "precioCompra" => $articulo->getPrecioCompra(),
                "iva"          => $articulo->getIva(),
                "modelo"       => $articulo->getModelo(),
                "proveedor"    => $articulo->getProveedor(),
                "tienda"       => $articulo->getTienda(),
                "cantidad"     => $articulo->getCantidad(),
                "descripcion"  => $articulo->getDescripcion(),
                "categoria"    => $articulo->getCategoria()
            ];
            echo json_encode($data);
        } else {
            echo json_encode(["error" => "Articulo no encontrado"]);
        }
    }

    // actualizar articulo desde post
    public function actualizarArticulo($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
            $data = $_POST;
            $this->service->actualizarArticulo($id, $data);
            echo json_encode(["message" => "Articulo actualizado"]);
        } else {
            echo json_encode(["error" => "No llegaron datos para actualizar"]);
        }
    }

    // mostrar formulario de edicion
    public function mostrarFormularioEditar($id)
    {
        $articulo = $this->service->obtenerArticuloPorId($id);

        if (!$articulo) {
            die("⚠️ Artículo no encontrado con ID $id");
        }

        include __DIR__ . "/../view/productoView/editar.php";
    }

    // eliminar articulo
    public function eliminarArticulo($id)
    {
        $this->service->eliminarArticulo($id);
        echo json_encode(["message" => "Articulo eliminado"]);
    }

    // listar articulos
    public function listarArticulos() {
        $articulos = $this->service->listarArticulos();

        $data = [];
        foreach ($articulos as $articulo) {
            $data[] = [
                "marca"        => $articulo->getMarca(),
                "precioVenta"  => $articulo->getPrecioVenta(),
                "precioCompra" => $articulo->getPrecioCompra(),
                "iva"          => $articulo->getIva(),
                "modelo"       => $articulo->getModelo(),
                "proveedor"    => $articulo->getProveedor(),
                "tienda"       => $articulo->getTienda(),
                "cantidad"     => $articulo->getCantidad(),
                "descripcion"  => $articulo->getDescripcion(),
                "categoria"    => $articulo->getCategoria()
            ];
        }

        echo json_encode($data);
    }

}
