<?php
$basePath = 'DesarrolloWebUni1';
$actionCrearUrl = $basePath . '/index.php?action=crear';
$listarUrl = $basePath . '/index.php?action=listar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
</head>
<body>
<h1>Crear Usuario</h1>
<form method="POST" action="<?= htmlspecialchars($actionCrearUrl, ENT_QUOTES, 'UTF-8') ?>">
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required maxlength="100">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required maxlength="100">
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required maxlength="100">
    </div>
    <button type="submit">Guardar</button>
</form>
<p><a href="<?= htmlspecialchars($listarUrl, ENT_QUOTES, 'UTF-8') ?>">Volver a la lista</a></p>
</body>
</html>
