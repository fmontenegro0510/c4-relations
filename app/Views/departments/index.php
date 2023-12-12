<!-- app/Views/departments/index.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Listado de Departamentos</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departments as $department): ?>
                <tr>
                    <td><?= $department['id'] ?></td>
                    <td><?= $department['name'] ?></td>
                    <td><?= $department['description'] ?></td>
                    <td><?= $department['location'] ?></td>
                    <td>
                        <a href="<?= base_url('department/show/' . $department['id']) ?>" class="btn btn-info btn-sm">Ver Detalles</a>
                        <a href="<?= base_url('department/edit/' . $department['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="<?= base_url('department/delete/' . $department['id']) ?>" onclick="return confirm('¿Estás seguro?')" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="<?= base_url('department/create') ?>" class="btn btn-primary">Nuevo Departamento</a>
</div>
<?= $this->endSection() ?>
