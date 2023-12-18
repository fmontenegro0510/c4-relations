<!-- app/Views/reports/employees_by_department_report.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Empleados por Departamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Informe de Empleados por Departamento</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Posición</th>
                <th>Salario</th>
                <th>Departamento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employeesByDepartment as $employee): ?>
                <tr>
                    <td><?= $employee['id'] ?></td>
                    <td><?= $employee['name'] ?></td>
                    <td><?= $employee['position'] ?></td>
                    <td><?= $employee['salary'] ?></td>
                    <td><?= $employee['department_name'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>