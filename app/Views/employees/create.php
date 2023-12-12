<!-- Crear un nuevo empleado -->
<h2>Crear Empleado</h2>
<?= form_open('employee/store') ?>
    <label for="name">Nombre:</label>
    <input type="text" name="name" required>
    <br>
    <label for="position">Posición:</label>
    <input type="text" name="position" required>
    <br>
    <label for="salary">Salario:</label>
    <input type="text" name="salary" required>
    <br>
    <label for="department_id">ID del Departamento:</label>
    <input type="text" name="department_id" required>
    <br>
    <button type="submit" class="btn btn-success">Guardar</button>
<?= form_close() ?>
