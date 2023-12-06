<!-- application/Views/courses/index.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <h2>Cursos</h2>
    <a href="<?= base_url('courses/create') ?>" class="btn btn-primary mb-3">Agregar Curso</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= $course->id ?></td>
                    <td><?= $course->name ?></td>
                    <td><?= $course->description ?></td>
                    <td>
                        <a href="<?= base_url('courses/edit/' . $course->id) ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="<?= base_url('courses/delete/' . $course->id) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection() ?>
