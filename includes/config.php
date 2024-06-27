<?php
$apiUrl = 'https://api.lacabane-parias.fr/api';

if (!function_exists('getStatsData')) {
    function getStatsData($apiUrl) {
        $statsData = file_get_contents("$apiUrl/stats");
        return json_decode($statsData, true);
    }
}
?>
