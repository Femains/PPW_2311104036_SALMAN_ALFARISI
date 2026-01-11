<?php
// index.php
session_start();

// Jika sudah login, redirect ke dashboard
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

// Jika ada cookie remember, coba validasi otomatis
require_once 'db.php';

if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember'])) {
    $token = $_COOKIE['remember'];
    $stmt  = $pdo->prepare('SELECT id, username, token_expire FROM users WHERE remember_token = ?');
    $stmt->execute([$token]);
    $row = $stmt->fetch();

    if ($row && new DateTime() < new DateTime($row['token_expire'])) {
        // valid token -> set session
        $_SESSION['user_id']  = $row['id'];
        $_SESSION['username'] = $row['username'];

        header('Location: dashboard.php');
        exit;
    } else {
        // hapus cookie kalau token tidak valid
        setcookie('remember', '', time() - 3600, '/');
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login</title>
</head>
<body>
    <h2>Form Login</h2>

    <?php if (isset($_GET['error'])): ?>
        <p style="color:red"><?= htmlspecialchars($_GET['error']) ?></p>
    <?php endif; ?>

    <form action="authenticate.php" method="post">
        <label>
            Username<br>
            <input type="text" name="username" required>
        </label>
        <br><br>

        <label>
            Password<br>
            <input type="password" name="password" required>
        </label>
        <br><br>

        <label>
            <input type="checkbox" name="remember" value="1"> Remember me
        </label>
        <br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
