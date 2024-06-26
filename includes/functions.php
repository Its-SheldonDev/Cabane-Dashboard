<?php
function callApi($endpoint, $method = 'GET', $data = null) {
    global $apiUrl;

    $url = $apiUrl . $endpoint;
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if ($method == 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    }

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function redirectIfNotLoggedIn() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
}
?>
