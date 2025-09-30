<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Estudiante</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    form { max-width: 400px; margin: auto; display: flex; flex-direction: column; gap: 10px; }
    input, select { padding: 6px; font-size: 14px; }
    button { padding: 8px; background: #28a745; color: #fff; border: none; cursor: pointer; }
    button:hover { background: #1e7e34; }
    .msg { margin-top: 15px; font-weight: bold; }
  </style>
</head>
<body>

  <h2>Editar Estudiante</h2>

  <form id="editarForm">
    <input type="number" name="id" placeholder="ID del estudiante" required>
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellido" placeholder="Apellido" required>
    <input type="date" name="fechaNacimiento" required>
    <input type="number" name="semestre" placeholder="Semestre" required>
    <input type="email" name="email" placeholder="Correo electrónico" required>
    <select name="genero" required>
      <option value="">Selecciona género</option>
      <option value="Masculino">Masculino</option>
      <option value="Femenino">Femenino</option>
    </select>
    <input type="text" name="telefono" placeholder="Teléfono" required>
    <input type="text" name="programa" placeholder="Programa" required>
    <input type="text" name="universidad" placeholder="Universidad" required>
    <button type="submit">Actualizar</button>
  </form>

  <div class="msg" id="mensaje"></div>

</body>
</html>
