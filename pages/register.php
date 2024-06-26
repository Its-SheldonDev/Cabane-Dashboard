<?php
include '../includes/header.php';
include '../includes/loader.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $response = callApi('/register', 'POST', ['username' => $username, 'password' => $password]);

    if (isset($response['message']) && $response['message'] == 'User registered successfully') {
        echo "<script>toastr.success('User registered successfully');</script>";
        header('refresh:2;url=login.php');
        exit();
    } else {
        $error = $response['message'] ?? 'An error occurred';
        echo "<script>toastr.error('$error');</script>";
    }
}
?>
<div class="register-form">
    <form method="post">
        <h2>Register</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
</div>
