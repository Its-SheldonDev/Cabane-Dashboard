<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/toastr/toastr.min.css">
    <script src="assets/toastr/toastr.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            toastr.success('Logout successful');
            setTimeout(function() {
                window.location.href = 'login.php';
            }, 2000); // Redirection après 2 secondes
        });
    </script>
</head>
<body>
</body>
</html>
