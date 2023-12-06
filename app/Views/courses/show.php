<!-- application/Views/courses/show.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <h2>Detalles del Curso</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $course->id ?></td>
                <td><?= $course->name ?></td>
                <td><?= $course->description ?></td>
                <td><?= $course->start_date ?></td>
                <td><?= $course->end_date ?></td>
            </tr>
        </tbody>
    </table>
    <a href="<?= base_url('courses') ?>" class="btn btn-secondary">Volver a la Lista de Cursos</a>
<?= $this->endSection() ?>
