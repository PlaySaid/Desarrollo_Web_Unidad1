<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Artículo</title>
</head>
<body>
<h1>Crear Articulo</h1>
<form method="POST" action="/DesarrolloWebUni1/index.php?action=crear">
    Marca: <input type="text" name="marca" required><br><br>
    Precio Venta: <input type="number" step="0.01" name="precioVenta" required><br><br>
    Precio Compra: <input type="number" step="0.01" name="precioCompra" required><br><br>
    IVA: <input type="number" step="0.01" name="iva" required><br><br>
    Modelo: <input type="text" name="modelo" required><br><br>
    Proveedor: <input type="text" name="proveedor" required><br><br>
    Tienda: <input type="text" name="tienda" required><br><br>
    Cantidad: <input type="number" name="cantidad" required><br><br>
    Descripción: <textarea name="descripcion"></textarea><br><br>
    Categoría: <input type="text" name="categoria" required><br><br>
    <button type="submit">Guardar</button>
</form>
<br>
<a href="http://localhost/DesarrolloWebUni1/index.php?action=listar">Volver a la lista</a>
</body>
</html>
