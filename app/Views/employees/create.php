<!-- app/Views/employees/create.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Nuevo Empleado</h1>
    
    <?= form_open_multipart('employee/store', ['method' => 'post']) ?> <!-- Añadido 'enctype' para admitir archivos -->
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
        <div class="form-group">
            <label for="department_id">Departamento:</label>
            <select name="department_id" class="form-control" required>
                <?php foreach ($departments as $department): ?>
                    <option value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="photo">Foto:</label>
            <input type="file" class="form-control" name="photo" accept="image/jpeg" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    <?= form_close() ?>
</div>
<?= $this->endSection() ?>
