<!-- app/Views/employees/show.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Detalles del Empleado</h1>

    <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $employee['name'] ?></h5>
                <p class="card-text">Posición: <?= $employee['position'] ?></p>
                <p class="card-text">Salario: <?= $employee['salary'] ?></p>
                <p class="card-text">Departamento: <?= $employee['department_name'] ?></p>
                <img src="<?= base_url('uploads/' . $employee['photo']) ?>" class="img-thumbnail" alt="Empleado Photo">
            </div>
        </div>

    <a href="<?= base_url('employee/generate-report/' . $employee['id']) ?>" target="_blank" class="btn btn-info mt-3">Generar PDF</a>
    <a href="<?= base_url('employees') ?>" class="btn btn-primary mt-3">Volver al Listado</a>
</div>
<?= $this->endSection() ?>
