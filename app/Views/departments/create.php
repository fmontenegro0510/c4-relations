<!-- app/Views/departments/create.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Nuevo Departamento</h1>

    <form action="<?= base_url('department/store') ?>" method="post">
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="location">Ubicación:</label>
            <input type="text" class="form-control" name="location" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?= $this->endSection() ?>
