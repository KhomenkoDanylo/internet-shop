<?php
// dashboard.php
// Личный кабинет пользователя
// Created by Danylo Khomenko
session_start();
require 'db.php';

// Проверьте, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Получение курсов
$stmt = $pdo->prepare("SELECT * FROM courses WHERE created_by = ?");
$stmt->execute([$_SESSION['user_id']]);
$courses = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Личный кабинет</title>
</head>
<body>
<h1>Добро пожаловать, <?php echo $_SESSION['username']; ?></h1>
<a href="add_course.php">Добавить курс</a>
<ul>
    <?php foreach ($courses as $course): ?>
        <li><?php echo $course['course_name']; ?></li>
    <?php endforeach; ?>
</ul>
</body>
</html>
