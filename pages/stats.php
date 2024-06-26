<?php
include '../includes/header.php';
include '../includes/loader.php';
redirectIfNotLoggedIn();

$response = callApi('/scans');

// Filtrer les scans pour n'afficher que ceux de la journée
$scans = array_filter($response['scans'], function($scan) {
    $scanDate = new DateTime($scan['date']);
    $today = new DateTime();
    return $scanDate->format('Y-m-d') === $today->format('Y-m-d');
});

$totalScansToday = count($scans);

function formatDateTime($dateStr) {
    $date = new DateTime($dateStr);
    return $date->format('d/m/Y') . ' à ' . $date->format('H\hi');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics | QR Cabane</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/stats.css">
</head>
<body>
    <div class="stats-container">
        <h2>Statistiques</h2>
        <p>Total des scans aujourd'hui : <?php echo $totalScansToday; ?></p>
        <div class="cards">
            <?php foreach ($scans as $scan): ?>
                <div class="card">
                    <div class="card-header">
                        <h3>Détails du scan</h3>
                    </div>
                    <div class="card-content">
                        <div class="info-group">
                            <div>
                                <strong>IP</strong>
                                <span><?php echo $scan['ip']; ?></span>
                            </div>
                            <div>
                                <strong>Premier Scan</strong>
                                <span><?php echo $scan['firstScan'] ? 'Yes' : 'No'; ?></span>
                            </div>
                        </div>
                        <div class="info-group">
                            <div>
                                <strong>Scans</strong>
                                <span><?php echo $scan['scanCount']; ?></span>
                            </div>
                            <div>
                                <strong>Date</strong>
                                <span><?php echo formatDateTime($scan['date']); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
