<?php
session_start();
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../auth/isAdmin.php';

// Обработка загрузки изображения
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/image/products/';
    
    // Создаем папку, если её нет
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    
    // Генерируем уникальное имя файла
    $file_ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    $file_name = 'product_' . time() . '.' . $file_ext;
    $target_path = $upload_dir . $file_name;
    
    // Перемещаем загруженный файл
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
        $image_path = 'image/products/' . $file_name;
    } else {
        die("Ошибка: не удалось сохранить изображение");
    }
} else {
    die("Ошибка загрузки изображения: " . $_FILES['image']['error']);
}

// Добавление нового товара
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = (float)$_POST['price'];
    $old_price = !empty($_POST['old_price']) ? (float)$_POST['old_price'] : null;
    
    // Обработка загрузки изображения
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = __DIR__ . '/../../image/products/';
        $file_name = uniqid() . '_' . basename($_FILES['image']['name']);
        $target_path = $upload_dir . $file_name;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            $image_path = 'image/products/' . $file_name;
        }
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO products (name, description, price, old_price, image_path) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $description, $price, $old_price, $image_path]);
        
        $_SESSION['success'] = "Товар успешно добавлен!";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Ошибка при добавлении товара: " . $e->getMessage();
    }
    
    header('Location: products.php');
    exit();
}

// Получение списка товаров
$products = $pdo->query("SELECT * FROM products ORDER BY created_at DESC")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Управление товарами</title>
    <link rel="stylesheet" href="/css/styles1.css">
</head>
<body>
    <div class="admin-container">
        <h1>Управление товарами</h1>
        
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        
        <div class="admin-sections">
            <section class="add-product">
                <h2>Добавить новый товар</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Название товара:</label>
                        <input type="text" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Описание:</label>
                        <textarea name="description"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Цена (₽):</label>
                        <input type="number" step="0.01" name="price" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Старая цена (₽, необязательно):</label>
                        <input type="number" step="0.01" name="old_price">
                    </div>
                    
                    <div class="form-group">
                        <label>Изображение:</label>
                        <input type="file" name="image" accept="image/*" required>
                    </div>
                    
                    <button type="submit" class="button">Добавить товар</button>
                </form>
            </section>
            
            <section class="product-list">
                <h2>Список товаров</h2>
                <div class="products-grid">
                    <?php foreach ($products as $product): ?>
                        <div class="product-item">
                            <img src="/<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                            <h3><?= htmlspecialchars($product['name']) ?></h3>
                            <p><?= htmlspecialchars($product['description']) ?></p>
                            <div class="prices">
                                <span class="current-price"><?= number_format($product['price'], 2, '.', ' ') ?>₽</span>
                                <?php if ($product['old_price']): ?>
                                    <span class="old-price"><?= number_format($product['old_price'], 2, '.', ' ') ?>₽</span>
                                <?php endif; ?>
                            </div>
                            <div class="actions">
                                <a href="edit_product.php?id=<?= $product['id'] ?>" class="button">Редактировать</a>
                                <a href="delete_product.php?id=<?= $product['id'] ?>" class="button delete" onclick="return confirm('Удалить товар?')">Удалить</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </div>
</body>
</html>