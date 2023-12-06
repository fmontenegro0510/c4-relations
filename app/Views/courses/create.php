<!-- application/Views/courses/create.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <h2>Agregar Curso</h2>
    <form action="<?= base_url('courses/store') ?>" method="post">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar Curso</button>
            <a href="<?= base_url('courses') ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
<?= $this->endSection() ?>
