<?php
/** @var int $id */
/** @var \domain\Articulo $articulo */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Artículo</title>
</head>
<body>
<h1>Editar Articulo</h1>

<form method="POST" action="/DesarrolloWebUni1/index.php?action=actualizar&id=<?php echo $id; ?>">
    Marca: <input type="text" name="marca" value="<?php echo $articulo->getMarca(); ?>"><br>
    Precio Venta: <input type="number" step="0.01" name="precioVenta" value="<?php echo $articulo->getPrecioVenta(); ?>"><br>
    Precio Compra: <input type="number" step="0.01" name="precioCompra" value="<?php echo $articulo->getPrecioCompra(); ?>"><br>
    IVA: <input type="number" step="0.01" name="iva" value="<?php echo $articulo->getIva(); ?>"><br>
    Modelo: <input type="text" name="modelo" value="<?php echo $articulo->getModelo(); ?>"><br>
    Proveedor: <input type="text" name="proveedor" value="<?php echo $articulo->getProveedor(); ?>"><br>
    Tienda: <input type="text" name="tienda" value="<?php echo $articulo->getTienda(); ?>"><br>
    Cantidad: <input type="number" name="cantidad" value="<?php echo $articulo->getCantidad(); ?>"><br>
    Descripción: <input type="text" name="descripcion" value="<?php echo $articulo->getDescripcion(); ?>"><br>
    Categoría: <input type="text" name="categoria" value="<?php echo $articulo->getCategoria(); ?>"><br>

    <button type="submit">Actualizar</button>
</form>


<br>
<a href="http://localhost/DesarrolloWebUni1/index.php?action=listar">Volver a la lista</a>
</body>
</html>