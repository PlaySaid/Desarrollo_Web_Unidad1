<?php
$basePath = 'DesarrolloWebUni1';
$loginUrl = $basePath . '/index.php?action=login';
$crearUrl = $basePath . '/index.php?action=crear';
$recordarUrl = $basePath . '/index.php?action=recordar';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Usuario</title>
</head>
<body>
<h1>Iniciar Sesión</h1>
<form method="POST" action="<?= $loginUrl ?>">
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required maxlength="100">
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required maxlength="100">
    </div>
    <button type="submit">Entrar</button>
</form>
<p><a href="<?= $recordarUrl ?>">¿Olvidaste tu contraseña?</a></p>
<p><a href="<?= $crearUrl ?>">Crear Usuario</a></p>
</body>
</html>
