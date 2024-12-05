<?php
session_start();

$date1 = $_POST['date1'] ?? ''; 
$date2 = $_POST['date2'] ?? '';
$days = '';
$minutes = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($date1 && $date2) {
        $d1 = new DateTime($date1);
        $d2 = new DateTime($date2);
        $interval = $d1->diff($d2);
        $days = $interval->days;
        $minutes = ($interval->days * 24 * 60) + ($interval->h * 60) + $interval->i;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>dz1</title>
    
</head>
<body>
    <style>
        body{
            background: #040511;
            color: #fff;
        }
        h1{
            margin: 10% 0 0 35%;
            width: 250px;
        }
        form{
            margin: 0 0 0 35%;
            width: 20%;
        }
        input{
            border: none;
            box-shadow: none;
            outline: none;
            padding: 8px;
            border-radius: 5px;
            background: #F1A93B;
        }
        h2,p{
            margin: 1% 0 0 35%;
            width: 7%;
        }
        button{
            background: #F1B150;
            padding: 8px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
        }
    </style>
    <h1>Ввод дат:</h1>
    <form method="post">
        <input type="date" name="date1" value="<?= htmlspecialchars($date1) ?>" required>
        <input type="date" name="date2" value="<?= htmlspecialchars($date2) ?>" required>
        <button type="submit">Узнать разницу</button>
    </form>
    <?php if ($days !== ''): ?>
        <h2>Результаты:</h2>
        <p>Дней: <strong><?= $days ?></strong></p>
        <p>Минут: <strong><?= $minutes ?></strong></p>
    <?php endif; ?>
</body>
</html>
