<!-- application/Views/courses/edit.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <h2>Editar Curso</h2>
    <form action="<?= base_url('courses/update/' . $course->id) ?>" method="post">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" value="<?= $course->name ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea name="description" class="form-control" required><?= $course->description ?></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar Curso</button>
            <a href="<?= base_url('courses') ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
<?= $this->endSection() ?>
