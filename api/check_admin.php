<?php
header('Content-Type: application/json; charset=utf-8');

$currentIp = $_SERVER['REMOTE_ADDR'];
$adminIpsFile = __DIR__ . '/admin_ips.json';
$isAdmin = false;

if (file_exists($adminIpsFile)) {
    $adminIps = json_decode(file_get_contents($adminIpsFile), true) ?: [];
    if (in_array($currentIp, $adminIps)) {
        $isAdmin = true;
    }
}

echo json_encode(['isAdmin' => $isAdmin]);
exit;
