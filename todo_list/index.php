<?php require 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>To-Do List</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2>To Do List</h2>
        </div>
        <div class="main-content">
            <h2>New Task</h2>
            <form action="add_task.php" method="POST">
                <input type="text" name="task" required>
                <button type="submit">Add Task</button>
            </form>

            <h3>Task Lists</h3>
            <ul class="task-list">
                <?php
                $stmt = $conn->query("SELECT * FROM tasks WHERE is_completed = 0 ORDER BY created_at DESC");
                while ($task = $stmt->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <li class='task-item'>
                        <?= htmlspecialchars($task['task_name']) ?>
                        <div class='button-group'>
                            <a class='complete-btn' href='complete_task.php?id=<?= $task['id'] ?>'>Complete</a>
                            <a class='delete-btn' href='delete_task.php?id=<?= $task['id'] ?>'>Delete</a>
                        </div>
                    </li>
                <?php endwhile; ?> 
            </ul>

            <h3>Completed Tasks</h3>
            <ul class="completed-tasks">
                <?php
                $stmt = $conn->query("SELECT * FROM tasks WHERE is_completed = 1 ORDER BY created_at DESC");
                while ($task = $stmt->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <li class='completed-item'>
                        <span><?= htmlspecialchars($task['task_name']) ?></span> <!-- ✅ Strikethrough only on task text -->
                        <div class='button-group'>
                            <a class='edit-btn' href='edit_task.php?id=<?= $task['id'] ?>'>Edit</a>
                            <a class='delete-btn' href='delete_task.php?id=<?= $task['id'] ?>'>Delete</a>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</body>
</html>
