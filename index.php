<?php
$host = "localhost";
$user = "root";
$pass = ""; 
$db   = "todolist";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $conn->query("INSERT INTO todo (title) VALUES ('$title')");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    if ($_POST['action'] === 'toggle') {
        $conn->query("UPDATE todo SET done = 1 - done WHERE id = $id");
    } elseif ($_POST['action'] === 'delete') {
        $conn->query("DELETE FROM todo WHERE id = $id");
    }
}


$result = $conn->query("SELECT * FROM todo ORDER BY created_at DESC");
$Staches = [];
while ($row = $result->fetch_assoc()) {
    $Staches[] = $row;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">To-Do App</a>
  </div>
</nav>

<div class="container">
    <form action="" method="POST" class="mb-4">
        <div class="input-group">
            <input type="text" name="title" class="form-control" placeholder="Task Title" required>
            <button type="submit" class="btn btn-success">Add</button>
        </div>
    </form>

    <ul class="list-group">
        <?php foreach ($Staches as $tache): ?>
            <?php $classe = $tache['done'] ? 'list-group-item-success' : 'list-group-item-warning'; ?>
            <li class="list-group-item d-flex justify-content-between align-items-center <?= $classe ?>">
                <?= htmlspecialchars($tache['title']) ?>
                <form method="POST" class="d-inline">
                    <input type="hidden" name="id" value="<?= $tache['id'] ?>">
                    <button type="submit" name="action" value="toggle" class="btn btn-sm btn-primary me-1">Toggle</button>
                    <button type="submit" name="action" value="delete" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>