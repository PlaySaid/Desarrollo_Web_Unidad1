<?php
$basePath = 'DesarrolloWebUni1';
$recordarUrl = $basePath . '/index.php?action=recordar';
$loginUrl = $basePath . '/index.php?action=login';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
</head>
<body>
<h1>Recuperar Contraseña</h1>
<form method="POST" action="<?= $recordarUrl ?>">
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required maxlength="100">
    </div>
    <button type="submit">Generar token</button>
</form>
<p><a href="<?= $loginUrl ?>">Volver al login</a></p>
</body>
</html>
