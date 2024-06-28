<?php
$apiUrl = 'http://45.13.119.88:3000/api';
$baseUrl = 'https://dash.lacabane-parias.fr/';

if (!function_exists('callApi')) {
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
}

if (!function_exists('getStatsData')) {
    function getStatsData($apiUrl) {
        $url = "$apiUrl/stats";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            error_log("cURL error: " . curl_error($ch));
            curl_close($ch);
            return null;
        }

        if ($httpCode !== 200) {
            error_log("HTTP status code: " . $httpCode);
            curl_close($ch);
            return null;
        }

        curl_close($ch);
        return json_decode($result, true);
    }
}
?>
