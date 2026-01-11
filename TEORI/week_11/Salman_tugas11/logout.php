<?php
// logout.php
session_start();
require_once 'db.php';

if (isset($_SESSION['user_id'])) {
    // bersihkan token remember di DB
    $stmt = $pdo->prepare('UPDATE users SET remember_token = NULL, token_expire = NULL WHERE id = ?');
    $stmt->execute([$_SESSION['user_id']]);
}

// hapus session
$_SESSION = [];

if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

session_destroy();

// hapus cookie remember
setcookie('remember', '', time() - 3600, '/');

header('Location: index.php');
exit;
