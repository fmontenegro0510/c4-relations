<!-- Mostrar lista de departamentos -->
<h2>Lista de Departamentos</h2>
<a href="<?= base_url('department/create') ?>" class="btn btn-primary">Crear Departamento</a>
<ul>
    <?php foreach ($departments as $department): ?>
        <li>
            <?= $department['name'] ?>
            <a href="<?= base_url("department/show/{$department['id']}") ?>">Ver Empleados</a>
            <a href="<?= base_url("department/edit/{$department['id']}") ?>" class="btn btn-warning">Editar</a>
            <a href="<?= base_url("department/delete/{$department['id']}") ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de borrar este departamento?')">Eliminar</a>
        </li>
    <?php endforeach; ?>
</ul>
        