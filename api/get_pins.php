<?php
session_start();

// Check if logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

// Read pins from JSON file
$pinsFile = '../data/pins.json';

if (!file_exists($pinsFile)) {
    echo json_encode([]);
    exit;
}

$pins = json_decode(file_get_contents($pinsFile), true);
echo json_encode($pins);
?>
