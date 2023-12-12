<!-- Editar un departamento existente -->
<h2>Editar Departamento</h2>
<?= form_open("department/update/{$department['id']}") ?>
    <label for="name">Nombre:</label>
    <input type="text" name="name" value="<?= $department['name'] ?>" required>
    <br>
    <label for="description">Descripción:</label>
    <textarea name="description"><?= $department['description'] ?></textarea>
    <br>
    <label for="location">Ubicación:</label>
    <input type="text" name="location" value="<?= $department['location'] ?>">
    <br>
    <button type="submit" class="btn btn-success">Actualizar</button>
<?= form_close() ?>
