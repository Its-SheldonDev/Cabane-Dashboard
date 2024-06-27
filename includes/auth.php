<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!function_exists('isLoggedIn')) {
    function isLoggedIn() {
        return isset($_SESSION['user']);
    }
}

if (!function_exists('redirectIfNotLoggedIn')) {
    function redirectIfNotLoggedIn() {
        global $baseUrl;
        if (!isLoggedIn()) {
            header('Location: ' . $baseUrl . 'pages/login.php');
            exit();
        }
    }
}
?>
