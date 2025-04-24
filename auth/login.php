<?php
session_start();
require_once __DIR__ . '/../config/db.php';

// Очищаем предыдущие сообщения
unset($_SESSION['error']);
unset($_SESSION['success']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Валидация данных
    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Все поля обязательны для заполнения";
        header('Location: ../index.php');
        exit();
    }

    try {
        // Поиск пользователя в базе данных
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Успешный вход
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email']
            ];
            
            $_SESSION['success'] = "Добро пожаловать, {$user['name']}!";
        } else {
            $_SESSION['error'] = "Неверный email или пароль";
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Ошибка сервера. Попробуйте позже.";
    }
}

header('Location: ../index.php');
exit();
?>