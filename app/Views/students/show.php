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
                <td><?= $student['id'] ?></td>
                <td><?= $student['name'] ?></td>
                <td><?= $student['email'] ?></td>
            </tr>
        </tbody>
    </table>
    <ul>
        <li><strong>ID:</strong> <?= $student['id'] ?></li>
        <li><strong>Nombre:</strong> <?= $student['name'] ?></li>
        <li><strong>Email:</strong> <?= $student['email'] ?></li>
        <!-- Otros detalles del estudiante -->
  
        <li><strong>Cursos Inscritos:</strong></li>
        <?php if (!empty($courses)): ?>
            <ul>
                <?php foreach ($courses as $course): ?>
                    <li>
                        <?= $course->name ?> - <?= $course->description ?>
                        <a href="<?= base_url("students/remove_one_course/{$student['id']}/{$course->id}") ?>" class="btn btn-sm btn-danger">Eliminar Curso</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>El estudiante no está inscrito en ningún curso.</p>
        <?php endif; ?>
    </ul>

    <h3>Agregar Curso</h3>
    <form action="<?= base_url("students/add_course/{$student['id']}") ?>" method="post">
        <div class="form-group">
            <label for="course">Seleccionar Curso:</label>
            <select name="course" class="form-control" required>
                <?php foreach ($all_courses as $course): ?>
                    <option value="<?= $course['id'] ?>"><?= $course['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar Curso</button>
        </div>
    </form>

    <a href="<?= base_url('students/edit/' . $student['id']) ?>" class="btn btn-warning">Editar Estudiante</a>
    <a href="<?= base_url('students/delete/' . $student['id']) ?>" class="btn btn-danger">Eliminar Estudiante</a>
    <a href="<?= base_url('students') ?>" class="btn btn-secondary">Volver a la Lista de Estudiantes</a>






    <a href="<?= base_url('students') ?>" class="btn btn-secondary">Volver a la Lista de Estudiantes</a>
<?= $this->endSection() ?>
