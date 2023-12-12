<!-- Vista para mostrar los resultados de la búsqueda de empleados -->
<h2>Resultados de la Búsqueda</h2>

<?= form_open('employee/search', ['method' => 'get']) ?>
    <label for="search">Buscar por nombre:</label>
    <input type="text" name="search" value="<?= $search ?>" placeholder="Nombre del empleado">
    <button type="submit" class="btn btn-info">Buscar</button>
<?= form_close() ?>

<ul>
    <?php foreach ($employees as $employee): ?>
        <!-- Mostrar resultados de búsqueda con información del departamento -->
        <li>
            <strong>Nombre:</strong> <?= $employee['name'] ?> <br>
            <strong>Posición:</strong> <?= $employee['position'] ?> <br>
            <strong>Salario:</strong> <?= $employee['salary'] ?> <br>
            <strong>Departamento:</strong> <?= $employee['department']['name'] ?> - <?= $employee['department']['description'] ?> - <?= $employee['department']['location'] ?>
        </li>
    <?php endforeach; ?>
</ul>

<a href="<?= base_url('employees') ?>" class="btn btn-primary">Volver a la lista de empleados</a>
