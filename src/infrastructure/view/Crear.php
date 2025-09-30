<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Estudiante</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    form { max-width: 400px; margin: auto; display: flex; flex-direction: column; gap: 10px; }
    input, select { padding: 6px; font-size: 14px; }
    button { padding: 8px; background: #007bff; color: #fff; border: none; cursor: pointer; }
    button:hover { background: #0056b3; }
    .msg { margin-top: 15px; font-weight: bold; }
  </style>
</head>
<body>

  <h2>Crear Estudiante</h2>

  <form id="crearForm">
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
    <button type="submit">Guardar</button>
  </form>

  <div class="msg" id="mensaje"></div>

</body>
</html>
