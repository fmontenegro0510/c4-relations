<!-- Editar un empleado existente -->
<h2>Editar Empleado</h2>
<?= form_open("employee/update/{$employee['id']}") ?>
    <label for="name">Nombre:</label>
    <input type="text" name="name" value="<?= $employee['name'] ?>" required>
    <br>
    <label for="position">Posición:</label>
    <input type="text" name="position" value="<?= $employee['position'] ?>" required>
    <br>
    <label for="salary">Salario:</label>
    <input type="text" name="salary" value="<?= $employee['salary'] ?>" required>
    <br>
    <label for="department_id">ID del Departamento:</label>
    <input type="text" name="department_id" value="<?= $employee['department_id'] ?>" required>
    <br>
    <button type="submit" class="btn btn-success">Actualizar</button>
<?= form_close() ?>
