<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo">Вариант 7</div>
        <nav>
            <ul>
                <li class="active"><a href="index.php">Главная</a></li>
                <li><a href="HTML.html">1.	HTML</a></li>
                <li><a href="JavaScript.html">2.	JavaScript</a></li>
                <li><a href="PHP.php">3.	PHP</a></li>
                <li><a href="Bootstrap.html">4.	Bootstrap</a></li>
                <li><a href="JSON.html">5.	JSON</a></li>
            </ul>
        </nav>
    </header>
<?php
// Массив с данными о врачах
$doctors = [
    [
        'name' => 'Иванова А.М.',
        'specialization' => 'Терапевт',
        'schedule' => '09:00 - 13:00 (Пн-Пт)',
        'room' => '101'
    ],
    [
        'name' => 'Петров С.И.',
        'specialization' => 'Хирург',
        'schedule' => '10:00 - 15:00 (Пн, Ср, Пт)',
        'room' => '205'
    ],
    [
        'name' => 'Сидорова Е.В.',
        'specialization' => 'Офтальмолог',
        'schedule' => '08:30 - 12:30 (Вт, Чт)',
        'room' => '312'
    ],
    [
        'name' => 'Козлов Д.Н.',
        'specialization' => 'Невролог',
        'schedule' => '14:00 - 18:00 (Пн-Пт)',
        'room' => '208'
    ],
    [
        'name' => 'Михайлова О.С.',
        'specialization' => 'Педиатр',
        'schedule' => '09:00 - 16:00 (Пн-Пт)',
        'room' => '104'
    ],
    [
        'name' => 'Смирнов В.П.',
        'specialization' => 'Терапевт',
        'schedule' => '14:00 - 18:00 (Пн-Пт)',
        'room' => '102'
    ]
];

// Получаем специализацию из параметра запроса
$specializationFilter = $_GET['specialization'] ?? 'Терапевт';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Расписание врачей-<?= strtolower($specializationFilter) ?>ов</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        h1 { color: #2c3e50; text-align: center; }
        .filter-nav { 
            background: #f8f9fa; 
            padding: 15px; 
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .filter-nav a {
            margin: 0 10px;
            color: #3498db;
            text-decoration: none;
        }
        .filter-nav a:hover { text-decoration: underline; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #e9e9e9; }
        .no-results { 
            text-align: center; 
            color: #e74c3c;
            padding: 20px;
            font-size: 18px;
        }
    </style>
</head>
<center><h3>3. PHP: Напишите код, который выводит таблицу только для определенной специализации (например, "терапевт").</h3></center><h3>
<body>
    <div class="container">
        <h1>Расписание приёма врачей</h1>
        
        <div class="filter-nav">
            Фильтр по специализации:
            <a href="?specialization=Терапевт">Терапевты</a>
            <a href="?specialization=Хирург">Хирурги</a>
            <a href="?specialization=Офтальмолог">Офтальмологи</a>
            <a href="?specialization=Невролог">Неврологи</a>
            <a href="?specialization=Педиатр">Педиатры</a>
        </div>
        
        <h2>Врачи-<?= htmlspecialchars(strtolower($specializationFilter)) ?>ы</h2>
        
        <?php
        // Фильтруем врачей по специализации
        $filteredDoctors = array_filter($doctors, function($doctor) use ($specializationFilter) {
            return $doctor['specialization'] === $specializationFilter;
        });
        
        if (count($filteredDoctors) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ФИО врача</th>
                        <th>Специализация</th>
                        <th>График работы</th>
                        <th>Кабинет</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filteredDoctors as $doctor): ?>
                    <tr>
                        <td><?= htmlspecialchars($doctor['name']) ?></td>
                        <td><?= htmlspecialchars($doctor['specialization']) ?></td>
                        <td><?= htmlspecialchars($doctor['schedule']) ?></td>
                        <td><?= htmlspecialchars($doctor['room']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-results">
                Врачей с специализацией "<?= htmlspecialchars($specializationFilter) ?>" не найдено.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
    <script src="js/script.js"></script>
</body>
</html>