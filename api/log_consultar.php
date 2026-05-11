<?php
error_reporting(0);
ini_set('display_errors', 0);

$clickStatsPath = 'click_stats.json';
$clickStats = ['consultar_clicks' => 0, 'enter_clicks' => 0];

if (file_exists($clickStatsPath)) {
    $clickStats = json_decode(@file_get_contents($clickStatsPath), true) ?? $clickStats;
}

$clickStats['consultar_clicks']++;

@file_put_contents($clickStatsPath, json_encode($clickStats, JSON_PRETTY_PRINT), LOCK_EX);

echo json_encode(['success' => true]);
