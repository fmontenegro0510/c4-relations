<!-- application/Views/students/create.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <h2>Agregar Estudiante</h2>
    <form action="<?= base_url('students/store') ?>" method="post">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar Estudiante</button>
            <a href="<?= base_url('students') ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
<?= $this->endSection() ?>
