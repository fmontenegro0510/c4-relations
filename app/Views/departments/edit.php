<!-- app/Views/departments/edit.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Editar Departamento</h1>

    <?= form_open('department/update/' . $department['id'], ['method' => 'post']) ?>
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" value="<?= $department['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control" name="description" rows="3" required><?= $department['description'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="location">Ubicación:</label>
            <input type="text" class="form-control" name="location" value="<?= $department['location'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    <?= form_close() ?>
</div>
<?= $this->endSection() ?>
