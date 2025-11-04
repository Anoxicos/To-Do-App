<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="List">TodoList</div>

<!-- Add Task Form -->
<div class="form">
    <form action="add.php" method="POST">
        <input type="text" name="title" placeholder="Task Title" required />
        <input type="submit" value="Add" />
    </form>
</div>

<!-- Task List -->
<div class="nav1">
    <ul>
        <?php
        $sql = "SELECT * FROM tasks ORDER BY id DESC";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()):
        ?>
        <li>
            <div class="lii">
                <div class="m" style="<?php echo $row['is_done'] ? 'text-decoration: line-through; color: gray;' : ''; ?>">
                    <?php echo htmlspecialchars($row['title']); ?>
                </div>
                <div class="click">
                    <?php if ($row['is_done']): ?>
                        <a href="undo.php?id=<?php echo $row['id']; ?>"><button class="but1">Undo</button></a>
                    <?php else: ?>
                        <a href="done.php?id=<?php echo $row['id']; ?>"><button class="but1">Done</button></a>
                    <?php endif; ?>
                    <a href="delete.php?id=<?php echo $row['id']; ?>"><button class="but2">X</button></a>
                </div>
            </div>
        </li>
        <?php endwhile; ?>
    </ul>
</div>

</body>
</html>
