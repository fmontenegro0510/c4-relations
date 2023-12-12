<!-- app/Views/employees/index.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
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
                        <a href="<?= base_url('employee/generate-report/' . $employee['id']) ?>" target="_blank" class="btn btn-info btn-sm">Ficha PDF</a>
                        <a href="<?= base_url('employee/edit/' . $employee['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="<?= base_url('employee/delete/' . $employee['id']) ?>" onclick="return confirm('¿Estás seguro?')" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('employee/create') ?>" class="btn btn-primary">Nuevo Empleado</a>
    <a href="<?= base_url('report/generate-employees-by-department-report') ?>" target="_blank" class="btn btn-secondary">Listado por Departamento PDF</a>
</div>
<?= $this->endSection() ?>
