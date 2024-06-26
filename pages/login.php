<?php
include '../includes/header.php';
include '../includes/loader.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $response = callApi('/login', 'POST', ['username' => $username, 'password' => $password]);

    if (isset($response['message']) && $response['message'] == 'Login successful') {
        $_SESSION['user'] = $username;
        echo "<script>$(document).ready(function() { toastr.success('Login successful', 'Success'); });</script>";
        header('refresh:2;url=stats.php');
        exit();
    } else {
        $error = $response['message'] ?? 'An error occurred';
        echo "<script>$(document).ready(function() { toastr.error('$error', 'Error'); });</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | QR Cabane</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
    <script src="https://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body>
    <div class="content">
        <div class="wrapper">
            <form method="post">
                <h2>Login</h2>
                <div class="input-field">
                    <input type="text" name="username" required>
                    <label>Utilisateur</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Mot de passe</label>
                </div>
                <button type="submit"><i class='bx bx-log-in'></i> Log In</button>
                <div class="register">
                    <p>Besoin d'un compte ? <a href="register.php">Contacter un Admin</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
