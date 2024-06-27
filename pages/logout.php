<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion | QR Cabane</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/logout.css">
</head>
<body>
    <div class="notification">
        <h2>Déconnexion réussie</h2>
        <p>Vous allez être redirigé dans <span id="countdown">3</span> secondes...</p>
    </div>
    <script src="../assets/js/logout.js"></script>
</body>
</html>
