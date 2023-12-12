<!-- app/Views/employees/search.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Empleados</title>
    <!-- Agregar enlaces a Bootstrap o tu framework de estilos preferido -->
</head>
<body>
    <h1>Búsqueda de Empleados</h1>

    <?= form_open('employee/search', ['method' => 'get']) ?>
        <label for="search">Buscar por nombre:</label>
        <input type="text" name="search" value="<?= $search ?>" placeholder="Nombre del empleado">
        <button type="submit" class="btn btn-info">Buscar</button>
    <?= form_close() ?>

    <ul>
        <?php foreach ($employees as $employee): ?>
            <li>
                <?= $employee['name'] ?> -
                <a href="<?= base_url('employee/generate-report/' . $employee['id']) ?>" target="_blank">Ficha PDF</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="<?= base_url('employees') ?>" class="btn btn-primary">Volver al Listado</a>
</body>
</html>
