<?php
include 'config.php';
include 'functions.php';

if (!isLoggedIn() && basename($_SERVER['PHP_SELF']) != 'login.php' && basename($_SERVER['PHP_SELF']) != 'register.php') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Cabane Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/header.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li class="logo"><a href="index.php"><img src="../assets/img/logo.png" alt="QR Cabane"></a></li>
            <li class="right">
                <a href="stats.php"><i class='bx bx-stats'></i> Stats</a>
                <a href="graph.php"><i class='bx bx-bar-chart'></i> Graphs</a>
                <a href="logout.php"><i class='bx bx-log-out'></i> Logout</a>
            </li>
        </ul>
    </nav>
</header>
</body>
</html>
