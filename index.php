<?php
include 'includes/auth.php';
include 'includes/header.php';
include 'includes/loader.php';

if (isLoggedIn()) {
    header('Location: pages/stats.php');
    exit();
} else {
    header('Location: pages/login.php');
    exit();
}
?>