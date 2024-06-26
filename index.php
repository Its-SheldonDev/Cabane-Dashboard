<?php
include 'includes/header.php';
include 'includes/loader.php';

// Redirige l'utilisateur vers la page des statistiques s'il est connecté
if (isLoggedIn()) {
    header('Location: ./pages/stats.php');
    exit();
} else {
    header('Location: ./pages/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Cabane Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to QR Cabane Dashboard</h1>
        <p>Please <a href="login.php">login</a> to access the dashboard.</p>
    </div>
</body>
</html>
