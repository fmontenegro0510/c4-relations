<!-- application/Views/students/manage_courses.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <h2>Administrar Cursos para el Estudiante <?= $student['name'] ?></h2>
    <form action="<?= base_url('students/add_course/' . $student['id']) ?>" method="post">
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

    <form action="<?= base_url('students/remove_course/' . $student['id']) ?>" method="post">
        <div class="form-group">
            <label for="course">Seleccionar Curso a Eliminar:</label>
            <select name="course" class="form-control" required>
                <?php foreach ($student_courses as $course): ?>
                    <option value="<?= $course['id'] ?>"><?= $course['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger">Eliminar Curso</button>
        </div>
    </form>

    <a href="<?= base_url('students/courses/' . $student['id']) ?>" class="btn btn-secondary">Volver a Cursos del Estudiante</a>
    <a href="<?= base_url('students') ?>" class="btn btn-secondary">Volver a la Lista de Estudiantes</a>
<?= $this->endSection() ?>
