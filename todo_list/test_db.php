<?php
$host = 'localhost';
$dbname = 'todo_list';
$username = 'root';  // Default XAMPP MySQL user
$password = '';  // Default password is empty

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Database connected successfully!";
} catch (PDOException $e) {
    echo "❌ Database connection failed: " . $e->getMessage();
}
?>
