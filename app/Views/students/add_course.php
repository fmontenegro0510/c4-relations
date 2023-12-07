<!-- application/Views/students/add_course.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <h2>Agregar Curso a Estudiante</h2>
    <p><strong>Estudiante:</strong> <?= $student->name ?></p>
    
    <form action="<?= base_url('students/add_course/' . $student->id) ?>" method="post">
        <div class="form-group">
            <label for="course">Seleccionar Curso:</label>
            <select name="course" class="form-control" required>
                <?php foreach ($courses as $course): ?>
                    <option value="<?= $course->id ?>"><?= $course->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar Curso</button>
            <a href="<?= base_url('students') ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
<?= $this->endSection() ?>