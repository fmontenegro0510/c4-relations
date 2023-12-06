<!-- application/Views/students/show.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <h2>Detalles del Estudiante</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $student->id ?></td>
                <td><?= $student->name ?></td>
                <td><?= $student->email ?></td>
            </tr>
        </tbody>
    </table>
    <a href="<?= base_url('students') ?>" class="btn btn-secondary">Volver a la Lista de Estudiantes</a>
<?= $this->endSection() ?>
