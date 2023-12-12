<!-- app/Views/employees/show.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Detalles del Empleado</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> <?= $employee['id'] ?></li>
        <li class="list-group-item"><strong>Nombre:</strong> <?= $employee['name'] ?></li>
        <li class="list-group-item"><strong>Posición:</strong> <?= $employee['position'] ?></li>
        <li class="list-group-item"><strong>Salario:</strong> <?= $employee['salary'] ?></li>
    </ul>

    <a href="<?= base_url('employee/generate-report/' . $employee['id']) ?>" target="_blank" class="btn btn-info mt-3">Generar PDF</a>
    <a href="<?= base_url('employees') ?>" class="btn btn-primary mt-3">Volver al Listado</a>
</div>
<?= $this->endSection() ?>
