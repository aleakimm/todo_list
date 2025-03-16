<?php
    include 'db.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $task = $_POST['task'];
        $stmt = $conn->prepare("INSERT INTO tasks (task_name) VALUES (:task)");
        $stmt->execute(['task' => $task]);
        header('Location: index.php');
    }
    ?>