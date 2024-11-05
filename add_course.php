<?php
// add_course.php
// Добавление нового курса
// Created by Danylo Khomenko
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_name = $_POST['course_name'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("INSERT INTO courses (course_name, description, created_by) VALUES (?, ?, ?)");
    $stmt->execute([$course_name, $description, $_SESSION['user_id']]);

    echo "Курс успешно добавлен!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Добавить курс</title>
</head>
<body>
<form method="POST">
    <input type="text" name="course_name" placeholder="Название курса" required>
    <textarea name="description" placeholder="Описание курса" required></textarea>
    <button type="submit">Добавить курс</button>
</form>
</body>
</html>
