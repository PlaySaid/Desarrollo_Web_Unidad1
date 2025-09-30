<?php
/** @var int $id */
/** @var \domain\Articulo $articulo */

// Base de la aplicación para construir URLs de forma mantenible
$basePath = '/DesarrolloWebUni1';
$actionActualizarUrl = $basePath . '/index.php?action=actualizar&id=' . urlencode((string)$id);
$listarUrl = $basePath . '/index.php?action=listar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Artículo</title>
</head>
<body>
<h1>Editar Artículo</h1>

<form method="POST" action="<?php echo htmlspecialchars($actionActualizarUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <div>
        <label for="marca">Marca</label>
        <input type="text" id="marca" name="marca" required maxlength="100" autocomplete="organization"
               value="<?php echo htmlspecialchars($articulo->getMarca(), ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div>
        <label for="precioVenta">Precio de venta</label>
        <input type="number" id="precioVenta" name="precioVenta" required step="0.01" min="0" inputmode="decimal"
               autocomplete="off"
               value="<?php echo htmlspecialchars((string)$articulo->getPrecioVenta(), ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div>
        <label for="precioCompra">Precio de compra</label>
        <input type="number" id="precioCompra" name="precioCompra" required step="0.01" min="0" inputmode="decimal"
               autocomplete="off"
               value="<?php echo htmlspecialchars((string)$articulo->getPrecioCompra(), ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div>
        <label for="iva">IVA (%)</label>
        <input type="number" id="iva" name="iva" required step="0.01" min="0" inputmode="decimal" autocomplete="off"
               value="<?php echo htmlspecialchars((string)$articulo->getIva(), ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div>
        <label for="modelo">Modelo</label>
        <input type="text" id="modelo" name="modelo" required maxlength="100" autocomplete="off"
               value="<?php echo htmlspecialchars($articulo->getModelo(), ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div>
        <label for="proveedor">Proveedor</label>
        <input type="text" id="proveedor" name="proveedor" required maxlength="100" autocomplete="organization"
               value="<?php echo htmlspecialchars($articulo->getProveedor(), ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div>
        <label for="tienda">Tienda</label>
        <input type="text" id="tienda" name="tienda" required maxlength="100" autocomplete="organization"
               value="<?php echo htmlspecialchars($articulo->getTienda(), ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div>
        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" required step="1" min="0" inputmode="numeric"
               autocomplete="off"
               value="<?php echo htmlspecialchars((string)$articulo->getCantidad(), ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <div>
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" rows="3" maxlength="1000"><?php
            echo htmlspecialchars($articulo->getDescripcion(), ENT_QUOTES, 'UTF-8');
            ?></textarea>
    </div>

    <div>
        <label for="categoria">Categoría</label>
        <input type="text" id="categoria" name="categoria" required maxlength="100" autocomplete="off"
               value="<?php echo htmlspecialchars($articulo->getCategoria(), ENT_QUOTES, 'UTF-8'); ?>">
    </div>

    <button type="submit">Actualizar</button>
</form>

<p>
    <a href="<?php echo htmlspecialchars($listarUrl, ENT_QUOTES, 'UTF-8'); ?>">Volver a la lista</a>
</p>
</body>
</html>