<!-- app/Views/employees/create.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Nuevo Empleado</h1>

    <?= form_open('employee/save', ['method' => 'post']) ?>
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label for="position">Posición:</label>
            <input type="text" class="form-control" name="position" required>
        </div>
        <div class="form-group">
            <label for="salary">Salario:</label>
            <input type="number" class="form-control" name="salary" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    <?= form_close() ?>
</div>
<?= $this->endSection() ?>
