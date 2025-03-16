<?php
require 'db.php'; // Ensure database connection is included

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("UPDATE tasks SET is_completed = 1 WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
}

// Redirect back to index.php
header("Location: index.php");
exit();
?>
