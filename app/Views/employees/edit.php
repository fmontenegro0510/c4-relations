<!-- app/Views/employees/edit.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Editar Empleado</h1>

    <div class="container mt-4">
        <h2>Actualizar Empleado</h2>
        
        <?= form_open_multipart('employees/update', ['method' => 'post']) ?>
            <input type="hidden" name="id" value="<?= $employee['id'] ?>">

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
            <div class="form-group">
                <label for="department_id">Departamento:</label>
                <select name="department_id" class="form-control" required>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?= $department['id'] ?>" <?= ($department['id'] == $employee['department_id']) ? 'selected' : '' ?>>
                            <?= $department['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Foto Actual: <?= $employee['photo']?> </label>
                <img src="<?= base_url('uploads/' . $employee['photo']) ?>" class="img-thumbnail" alt="Empleado Photo">
            </div>
            <div class="form-group">
                <label for="new_photo">Nueva Foto:</label>
                <input type="file" class="form-control" name="new_photo" accept="image/jpeg">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        <?= form_close() ?>
    </div>



</div>
<?= $this->endSection() ?>
