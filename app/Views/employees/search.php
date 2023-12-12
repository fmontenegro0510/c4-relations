<!-- app/Views/employees/search.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Búsqueda de Empleados</h1>

    <?= form_open('employee/search', ['method' => 'get']) ?>
        <div class="form-group">
            <label for="search">Buscar por nombre:</label>
            <input type="text" class="form-control" name="search" value="<?= $search ?>" placeholder="Nombre del empleado">
        </div>
        <button type="submit" class="btn btn-info">Buscar</button>
    <?= form_close() ?>

    <ul class="list-group mt-3">
        <?php foreach ($employees as $employee): ?>
            <li class="list-group-item">
                <?= $employee['name'] ?> -
                <a href="<?= base_url('employee/generate-report/' . $employee['id']) ?>" target="_blank" class="btn btn-info btn-sm">Ficha PDF</a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="<?= base_url('employees') ?>" class="btn btn-primary mt-3">Volver al Listado</a>
</div>
<?= $this->endSection() ?>
