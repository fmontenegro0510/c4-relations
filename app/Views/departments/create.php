<!-- Crear un nuevo departamento -->
<h2>Crear Departamento</h2>
<?= form_open('department/store') ?>
    <label for="name">Nombre:</label>
    <input type="text" name="name" required>
    <br>
    <label for="description">Descripción:</label>
    <textarea name="description"></textarea>
    <br>
    <label for="location">Ubicación:</label>
    <input type="text" name="location">
    <br>
    <button type="submit" class="btn btn-success">Guardar</button>
<?= form_close() ?>
