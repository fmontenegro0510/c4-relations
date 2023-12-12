<!-- Mostrar detalles del departamento y empleados -->
<h2>Detalles del Departamento</h2>
<p><strong>Nombre:</strong> <?= $department['name'] ?></p>
<p><strong>Descripción:</strong> <?= $department['description'] ?></p>
<p><strong>Ubicación:</strong> <?= $department['location'] ?></p>

<h3>Empleados</h3>
<ul>
    <?php foreach ($employees as $employee): ?>
        <li><?= $employee['name'] ?> - <?= $employee['position'] ?> - <?= $employee['salary'] ?></li>
    <?php endforeach; ?>
</ul>

<a href="<?= base_url('departments') ?>" class="btn btn-primary">Volver a la lista de departamentos</a>
