<?php
include '../includes/header.php';
include '../includes/loader.php';
redirectIfNotLoggedIn();

$response = callApi('/scans');

$totalScansToday = $response['totalScansToday'] ?? 0;
$scans = $response['scans'] ?? [];
?>
<div class="stats-container">
    <h2>Statistics</h2>
    <p>Total Scans Today: <?php echo $totalScansToday; ?></p>
    <table>
        <thead>
            <tr>
                <th>IP</th>
                <th>User-Agent</th>
                <th>First Scan</th>
                <th>Scan Count</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($scans as $scan): ?>
                <tr>
                    <td><?php echo $scan['ip']; ?></td>
                    <td><?php echo $scan['userAgent']; ?></td>
                    <td><?php echo $scan['firstScan'] ? 'Yes' : 'No'; ?></td>
                    <td><?php echo $scan['scanCount']; ?></td>
                    <td><?php echo $scan['date']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
