<?php
include '../includes/api.php';
include '../includes/auth.php';
include '../includes/header.php';
include '../includes/loader.php';

redirectIfNotLoggedIn();

// Fetch the aggregated statistics data from the API
$stats = getStatsData($apiUrl);

$dayData = [];
$monthData = [];

foreach ($stats['dayStats'] as $stat) {
    $dayData[$stat['_id']] = $stat['count'];
}

foreach ($stats['monthStats'] as $stat) {
    $monthData[$stat['_id']] = $stat['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan Graphs | QR Cabane</title>
    <link rel="icon" href="../assets/img/fav.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../assets/css/graph.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
</head>
<body>
<div class="container">
    <h2>Scan Graphs</h2>
    <div id="dayChart"></div>
    <div id="monthChart"></div>
</div>
<script src="https://code.jquery.com/jquery-2.0.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="../assets/js/graph.js" defer></script>
<script type="application/json" id="dayLabels"><?= json_encode(array_keys($dayData)); ?></script>
<script type="application/json" id="dayCounts"><?= json_encode(array_values($dayData)); ?></script>
<script type="application/json" id="monthLabels"><?= json_encode(array_keys($monthData)); ?></script>
<script type="application/json" id="monthCounts"><?= json_encode(array_values($monthData)); ?></script>
</body>
</html>
