<!-- Vista para mostrar estadísticas de empleados por departamento -->
<h2>Estadísticas por Departamento</h2>

<table class="table">
    <thead>
        <tr>
            <th>Departamento</th>
            <th>Total de Empleados</th>
            <th>Empleados que ganan más de $5000</th>
            <th>Porcentaje de Empleados con Salario > $5000</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($statistics as $statistic): ?>
            <tr>
                <td><?= $statistic['department']['name'] ?></td>
                <td><?= $statistic['totalEmployees'] ?></td>
                <td><?= $statistic['totalHighSalaryEmployees'] ?></td>
                <td><?= number_format($statistic['percentageHighSalary'], 2) ?>%</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="<?= base_url('employees') ?>" class="btn btn-primary">Volver a la lista de empleados</a>
