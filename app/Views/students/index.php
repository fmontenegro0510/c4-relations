<!-- application/Views/students/index.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <h2>Estudiantes</h2>
    <a href="<?= base_url('students/create') ?>" class="btn btn-primary mb-3">Agregar Estudiante</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= is_object($student) ? $student->id : $student['id'] ?></td>
                    <td><?= is_object($student) ? $student->name : $student['name'] ?></td>
                    <td><?= is_object($student) ? $student->email : $student['email'] ?></td>
                    <td>
                        <a href="<?= base_url("students/" . (is_object($student) ? $student->id : $student['id'])) ?>" class="btn btn-info btn-sm">Ver Detalles</a>
                        <a href="<?= base_url("students/edit/" . (is_object($student) ? $student->id : $student['id'])) ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="<?= base_url("students/delete/" . (is_object($student) ? $student->id : $student['id'])) ?>" class="btn btn-danger btn-sm">Eliminar</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection() ?>
