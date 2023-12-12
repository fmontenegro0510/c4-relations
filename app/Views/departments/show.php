<!-- app/Views/departments/show.php -->

<?= $this->extend('main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h1>Detalles del Departamento</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> <?= $department['id'] ?></li>
        <li class="list-group-item"><strong>Nombre:</strong> <?= $department['name'] ?></li>
        <li class="list-group-item"><strong>Descripción:</strong> <?= $department['description'] ?></li>
        <li class="list-group-item"><strong>Ubicación:</strong> <?= $department['location'] ?></li>
    </ul>

    <a href="<?= base_url('departments') ?>" class="btn btn-primary mt-3">Volver al Listado</a>
</div>
<?= $this->endSection() ?>
