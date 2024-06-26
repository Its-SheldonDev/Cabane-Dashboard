<?php
include '../includes/header.php';
include '../includes/loader.php';


if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}

// Fetch the aggregated statistics data from the API
$apiUrl = 'https://api.lacabane-parias.fr/api/stats';
$statsData = file_get_contents($apiUrl);
$stats = json_decode($statsData, true);

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
    <title>Scan Graphs</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <script src="https://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body>
<div class="container">
    <h2>Scan Graphs</h2>
    <div id="dayChart"></div>
    <div id="monthChart"></div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dayLabels = <?= json_encode(array_keys($dayData)); ?>;
        const dayCounts = <?= json_encode(array_values($dayData)); ?>;
        
        const monthLabels = <?= json_encode(array_keys($monthData)); ?>;
        const monthCounts = <?= json_encode(array_values($monthData)); ?>;

        var optionsDay = {
            chart: {
                type: 'line',
                height: 350,
                toolbar: {
                    show: false
                },
                background: '#12141c'
            },
            colors: ['#00E396'],
            series: [{
                name: 'Scans per Day',
                data: dayCounts
            }],
            xaxis: {
                categories: dayLabels,
                labels: {
                    style: {
                        colors: '#FFFFFF'
                    }
                },
                axisBorder: {
                    show: true,
                    color: '#FFFFFF'
                },
                axisTicks: {
                    show: true,
                    color: '#FFFFFF'
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#FFFFFF'
                    }
                }
            },
            tooltip: {
                theme: 'dark'
            }
        };

        var chartDay = new ApexCharts(document.querySelector("#dayChart"), optionsDay);
        chartDay.render();

        var optionsMonth = {
            chart: {
                type: 'bar',
                height: 350,
                toolbar: {
                    show: false
                },
                background: '#12141c'
            },
            colors: ['#00E396'],
            series: [{
                name: 'Scans per Month',
                data: monthCounts
            }],
            xaxis: {
                categories: monthLabels,
                labels: {
                    style: {
                        colors: '#FFFFFF'
                    }
                },
                axisBorder: {
                    show: true,
                    color: '#FFFFFF'
                },
                axisTicks: {
                    show: true,
                    color: '#FFFFFF'
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#FFFFFF'
                    }
                }
            },
            tooltip: {
                theme: 'dark'
            }
        };

        var chartMonth = new ApexCharts(document.querySelector("#monthChart"), optionsMonth);
        chartMonth.render();

        toastr.success('Graphiques Chargés', 'Success');
    });
</script>
</body>
</html>
