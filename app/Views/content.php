<!-- application/Views/content.php -->
<?= $this->extend('main') ?>

<?= $this->section('content') ?>
    <div class="jumbotron">
        <h1 class="display-4">Contenido Específico</h1>
        <p class="lead">Este es un contenido específico para la página principal.</p>
        <hr class="my-4">
        <p>Puedes personalizar esta sección según tus necesidades.</p>
    </div>
<?= $this->endSection() ?>
