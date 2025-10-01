<?php
$basePath = 'DesarrolloWebUni1';
$crearUrl = $basePath . '/index.php?action=crear';
$logoutUrl = $basePath . '/index.php?action=logout';
$listarUrl = $basePath . '/index.php?action=listar';

/** @var TYPE_NAME $usuarios */
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
</head>
<body>
<h1>Usuarios</h1>
<p><a href="<?= $crearUrl ?>">Crear Usuario</a> | <a href="<?= $logoutUrl ?>">Cerrar sesión</a></p>
<table border="1">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th>
    </tr>
    <?php foreach($usuarios as $usuario): ?>
        <tr>
            <td><?= htmlspecialchars($usuario->getNombre()) ?></td>
            <td><?= htmlspecialchars($usuario->getEmail()) ?></td>
            <td>
                <a href="<?= $basePath ?>/index.php?action=editar&id=<?= $usuario->getId() ?>">Editar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
