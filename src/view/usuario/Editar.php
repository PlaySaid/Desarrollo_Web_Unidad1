<?php

$basePath = 'DesarrolloWebUni1';
$actionActualizarUrl = $basePath . '/index.php?action=editar&id=' . urlencode((string)$usuario->getId());
$listarUrl = $basePath . '/index.php?action=listar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
<h1>Editar Usuario</h1>
<form method="POST" action="<?= htmlspecialchars($actionActualizarUrl, ENT_QUOTES, 'UTF-8') ?>">
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required maxlength="100" value="<?= htmlspecialchars($usuario->getNombre(), ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required maxlength="100" value="<?= htmlspecialchars($usuario->getEmail(), ENT_QUOTES, 'UTF-8') ?>">
    </div>
    <div>
        <label for="password">Contraseña (dejar vacío para no cambiar)</label>
        <input type="password" id="password" name="password" maxlength="100">
    </div>
    <button type="submit">Actualizar</button>
</form>
<p><a href="<?= htmlspecialchars($listarUrl, ENT_QUOTES, 'UTF-8') ?>">Volver a la lista</a></p>
</body>
</html>
