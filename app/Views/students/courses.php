<!-- application/Views/students/courses.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <h2>Cursos del Estudiante <?= $student->name ?></h2>
    <ul>
        <?php if (empty($student_courses)): ?>
            <p>El estudiante no está inscrito en ningún curso.</p>
        <?php else: ?>
            <?php foreach ($student_courses as $course): ?>
                <li><?= $course->name ?> - <?= $course->description ?></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

    <a href="<?= base_url('students/add_course/' . $student->id) ?>" class="btn btn-primary">Agregar Curso</a>
    <a href="<?= base_url('students/remove_course/' . $student->id) ?>" class="btn btn-danger">Eliminar Curso</a>
    <a href="<?= base_url('students') ?>" class="btn btn-secondary">Volver a la Lista de Estudiantes</a>
<?= $this->endSection() ?>
