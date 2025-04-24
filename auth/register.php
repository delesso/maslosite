<?php
session_start();
require_once __DIR__ . '/../config/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Валидация
    if (empty($name)) {
        $errors[] = "Введите имя";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Введите корректный email";
    }
    
    if (empty($password) || strlen($password) < 6) {
        $errors[] = "Пароль должен быть не менее 6 символов";
    }
    
    if ($password !== $confirm_password) {
        $errors[] = "Пароли не совпадают";
    }

    // Если есть ошибки - сохраняем и возвращаем
    if (!empty($errors)) {
        $_SESSION['error'] = implode("<br>", $errors);
        header('Location: ../index.php');
        exit();
    }

    try {
        // Проверка существования пользователя
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = "Пользователь с таким email уже существует";
            header('Location: ../index.php');
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Создание пользователя
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $hashed_password]);

        // Автоматический вход после регистрации
        $_SESSION['user'] = [
            'id' => $pdo->lastInsertId(),
            'name' => $name,
            'email' => $email
        ];
        
        $_SESSION['success'] = "Регистрация прошла успешно! Добро пожаловать, $name!";
        header('Location: ../index.php');
        exit();
        
    } catch (PDOException $e) {
        $_SESSION['error'] = "Ошибка при регистрации: " . $e->getMessage();
        header('Location: ../index.php');
        exit();
    }
} else {
    // Если запрос не POST - перенаправляем
    header('Location: ../index.php');
    exit();
}
?>