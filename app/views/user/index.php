<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>
    <h1>Users</h1>
    <ul>
        <?php foreach($users as $user): ?>
            <li><?php echo htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?> - <?php echo $user['email']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
