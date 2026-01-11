<?php
// authenticate.php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);

// ambil user
$stmt = $pdo->prepare('SELECT id, username, password_hash FROM users WHERE username = ?');
$stmt->execute([$username]);
$user = $stmt->fetch();

if (!$user) {
    header('Location: index.php?error=' . urlencode('Username tidak ditemukan'));
    exit;
}

if (!password_verify($password, $user['password_hash'])) {
    header('Location: index.php?error=' . urlencode('Password salah'));
    exit;
}

// autentikasi berhasil
$_SESSION['user_id']  = $user['id'];
$_SESSION['username'] = $user['username'];

if ($remember) {
    // buat token random dan simpan ke DB dengan expire 7 hari
    $token  = bin2hex(random_bytes(32));
    $expire = new DateTime('+7 days');

    $stmt = $pdo->prepare('UPDATE users SET remember_token = ?, token_expire = ? WHERE id = ?');
    $stmt->execute([
        $token,
        $expire->format('Y-m-d H:i:s'),
        $user['id']
    ]);

    // set cookie (HttpOnly)
    setcookie('remember', $token, time() + 60 * 60 * 24 * 7, '/', '', false, true);
}

header('Location: dashboard.php');
exit;
