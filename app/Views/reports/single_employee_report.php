<!-- app/Views/reports/single_employee_report.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Report</title>
</head>
<body>
    <h1>Employee Report - <?= $employee['name'] ?></h1>
    <img src="<?= $imagePath ?>" style="max-width: 100%;" />
    <p>ID: <?= $employee['id'] ?></p>
    <p>Name: <?= $employee['name'] ?></p>
    <p>Position: <?= $employee['position'] ?></p>
    <p>Salary: <?= $employee['salary'] ?></p>
</body>
</html>
