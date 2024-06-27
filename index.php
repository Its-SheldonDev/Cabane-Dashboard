<?php
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/loader.php';

// Redirige l'utilisateur vers la page des statistiques s'il est connecté
if (isLoggedIn()) {
    header('Location: pages/stats.php');
    exit();
} else {
    header('Location: pages/login.php');
    exit();
}
?>