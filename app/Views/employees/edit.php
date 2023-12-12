<!-- app/Views/employees/edit.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Editar Empleado</h1>

    <?= form_open('employee/update/' . $employee['id'], ['method' => 'post']) ?>
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" value="<?= $employee['name'] ?>" required>
        </div>
        <div class="form-group">
            <label for="position">Posición:</label>
            <input type="text" class="form-control" name="position" value="<?= $employee['position'] ?>" required>
        </div>
        <div class="form-group">
            <label for="salary">Salario:</label>
            <input type="number" class="form-control" name="salary" value="<?= $employee['salary'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    <?= form_close() ?>
</div>
<?= $this->endSection() ?>
