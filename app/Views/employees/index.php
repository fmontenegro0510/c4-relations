<!-- app/Views/employees/index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Empleados</title>
    <!-- Agregar enlaces a Bootstrap o tu framework de estilos preferido -->
</head>
<body>
    <h1>Listado de Empleados</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Posición</th>
                <th>Salario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?= $employee['id'] ?></td>
                    <td><?= $employee['name'] ?></td>
                    <td><?= $employee['position'] ?></td>
                    <td><?= $employee['salary'] ?></td>
                    <td>
                        <a href="<?= base_url('employee/generate-report/' . $employee['id']) ?>" target="_blank">Ficha PDF</a>
                        <a href="<?= base_url('employee/edit/' . $employee['id']) ?>">Editar</a>
                        <a href="<?= base_url('employee/delete/' . $employee['id']) ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('employee/create') ?>" class="btn btn-primary">Nuevo Empleado</a>
    <a href="<?= base_url('report/generate-employees-by-department-report') ?>" target="_blank" class="btn btn-secondary">Listado por Departamento PDF</a>
</body>
</html>
