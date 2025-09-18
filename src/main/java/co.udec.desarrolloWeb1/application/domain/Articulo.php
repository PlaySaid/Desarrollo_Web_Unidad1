<?php

class Articulo
{
    private string $marca;
    private float $precioVenta;
    private float $precioCompra;
    private float $iva;
    private string $modelo;
    private string $proveedor;
    private string $tienda;
    private int $cantidad;
    private string $descripcion;
    private string $categoria;


    // Constructor
    public function __construct(
        string $marca,
        float  $precioVenta,
        float  $precioCompra,
        float  $iva,
        string $modelo,
        string $proveedor,
        string $tienda,
        int    $cantidad,
        string $descripcion,
        string $categoria
    )
    {
        $this->marca = $marca;
        $this->precioVenta = $precioVenta;
        $this->precioCompra = $precioCompra;
        $this->iva = $iva;
        $this->modelo = $modelo;
        $this->proveedor = $proveedor;
        $this->tienda = $tienda;
        $this->cantidad = $cantidad;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
    }


    // Los Getters y Setters
    public function getMarca(): string{return $this->marca;}
    public function getPrecioVenta(): float { return $this->precioVenta; }
    public function getPrecioCompra(): float { return $this->precioCompra; }
    public function getIva(): float { return $this->iva; }
    public function getModelo(): string { return $this->modelo; }
    public function getProveedor(): string { return $this->proveedor; }
    public function getTienda(): string { return $this->tienda; }
    public function getCantidad(): int { return $this->cantidad; }
    public function getDescripcion(): string { return $this->descripcion; }
    public function getCategoria(): string { return $this->categoria; }
}
