<!-- application/Views/students/edit.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <h2>Editar Estudiante</h2>
    <form action="<?= base_url('students/update/' . $student->id) ?>" method="post">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" value="<?= $student->name ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="<?= $student->email ?>" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Actualizar Estudiante</button>
            <a href="<?= base_url('students') ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
<?= $this->endSection() ?>
