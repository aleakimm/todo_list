<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE tasks SET task_name = :task_name WHERE id = :id");
    $stmt->bindParam(':task_name', $_POST['task_name']);
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $task = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$task) {
        echo "Task not found!";
        exit;
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Edit Task</h2>
    <form action="edit_task.php" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']); ?>">
        <input type="text" name="task_name" value="<?= htmlspecialchars($task['task_name']); ?>" required>
        <button type="submit">Update</button>
    </form>
</body>
</html>
