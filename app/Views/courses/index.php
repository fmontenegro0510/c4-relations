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
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= is_object($course) ? $course->id : $course['id'] ?></td>
                    <td><?= is_object($course) ? $course->name : $course['name']   ?></td>
                    <td><?= is_object($course) ? $course->description : $course['description']   ?></td>
                    <td><?= is_object($course) ? $course->start_date : $course['start_date']   ?></td>
                    <td><?= is_object($course) ? $course->end_date : $course['end_date'] ?></td>
                    <td>
                        <a href="<?= base_url('courses/' . $course['id']) ?>" class="btn btn-info btn-sm">Ver Detalles</a>
                        <a href="<?= base_url('courses/edit/' . $course['id']) ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="<?= base_url('courses/delete/' . $course['id']) ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection() ?>
