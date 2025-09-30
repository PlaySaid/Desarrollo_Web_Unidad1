<?php
// Base de la aplicación para construir URLs de forma mantenible
$basePath = '/DesarrolloWebUni1';
$actionCrearUrl = $basePath . '/index.php?action=crear';
$listarUrl = $basePath . '/index.php?action=listar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Artículo</title>
</head>
<body>
<h1>Crear Artículo</h1>

<form method="POST" action="<?php echo htmlspecialchars($actionCrearUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <div>
        <label for="marca">Marca</label>
        <input type="text" id="marca" name="marca" required maxlength="100" autocomplete="organization">
    </div>

    <div>
        <label for="precioVenta">Precio de venta</label>
        <input type="number" id="precioVenta" name="precioVenta" required step="0.01" min="0" inputmode="decimal"
               autocomplete="off">
    </div>

    <div>
        <label for="precioCompra">Precio de compra</label>
        <input type="number" id="precioCompra" name="precioCompra" required step="0.01" min="0" inputmode="decimal"
               autocomplete="off">
    </div>

    <div>
        <label for="iva">IVA (%)</label>
        <input type="number" id="iva" name="iva" required step="0.01" min="0" inputmode="decimal" autocomplete="off">
    </div>

    <div>
        <label for="modelo">Modelo</label>
        <input type="text" id="modelo" name="modelo" required maxlength="100" autocomplete="off">
    </div>

    <div>
        <label for="proveedor">Proveedor</label>
        <input type="text" id="proveedor" name="proveedor" required maxlength="100" autocomplete="organization">
    </div>

    <div>
        <label for="tienda">Tienda</label>
        <input type="text" id="tienda" name="tienda" required maxlength="100" autocomplete="organization">
    </div>

    <div>
        <label for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="cantidad" required step="1" min="0" inputmode="numeric"
               autocomplete="off">
    </div>

    <div>
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" rows="3" maxlength="1000"></textarea>
    </div>

    <div>
        <label for="categoria">Categoría</label>
        <input type="text" id="categoria" name="categoria" required maxlength="100" autocomplete="off">
    </div>

    <button type="submit">Guardar</button>
</form>

<p>
    <a href="<?php echo htmlspecialchars($listarUrl, ENT_QUOTES, 'UTF-8'); ?>">Volver a la lista</a>
</p>
</body>
</html>