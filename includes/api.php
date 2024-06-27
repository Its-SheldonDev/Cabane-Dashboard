<?php
$apiUrl = '45.13.119.88:3000/api';
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
        $statsData = file_get_contents("$apiUrl/stats");
        return json_decode($statsData, true);
    }
}
?>
