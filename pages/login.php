<?php
include '../includes/header.php';
include '../includes/loader.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $response = callApi('/login', 'POST', ['username' => $username, 'password' => $password]);

    if (isset($response['message']) && $response['message'] == 'Login successful') {
        $_SESSION['user'] = $username;
        header('Location: stats.php');
        exit();
    } else {
        $error = $response['message'] ?? 'An error occurred';
        echo "<script>alert('$error');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion | QR Cabane</title>
    <link rel="icon" href="../assets/img/fav.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/login.css">
</head>
<body>
    <div class="content">
        <div class="wrapper">
            <form method="post">
                <h2>Connexion</h2>
                <div class="input-field">
                    <input type="text" name="username" required>
                    <label>Utilisateur</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password" required>
                    <label>Mot de passe</label>
                </div>
                <button type="submit">
                    <img src="../assets/img/svg/login.svg" alt="login icon" />
                    Se Connecter
                </button>
                <div class="register">
                    <p>Besoin d'un compte ? <a href="mailto:contact@sheldon-dev.fr">Contacter un Admin</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
