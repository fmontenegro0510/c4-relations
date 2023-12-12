<!-- Mostrar lista de empleados -->
<h2>Lista de Empleados</h2>
<a href="<?= base_url('employee/create') ?>" class="btn btn-primary">Crear Empleado</a>
<ul>
    <?php foreach ($employees as $employee): ?>
        <li>
            <?= $employee['name'] ?> - <?= $employee['position'] ?> - <?= $employee['salary'] ?>
            <a href="<?= base_url("employee/edit/{$employee['id']}") ?>" class="btn btn-warning">Editar</a>
            <a href="<?= base_url("employee/delete/{$employee['id']}") ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de borrar este empleado?')">Eliminar</a>
        </li>
    <?php endforeach; ?>
</ul>
