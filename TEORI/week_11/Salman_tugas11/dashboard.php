<?php
// dashboard.php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat datang, <?= htmlspecialchars($_SESSION['username']) ?></h2>

    <p>Ini adalah halaman protected.</p>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
