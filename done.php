<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("UPDATE tasks SET is_done = 1 WHERE id = $id");
}

header("Location: index.php");
exit();
?>
