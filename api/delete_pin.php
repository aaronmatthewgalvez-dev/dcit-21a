<?php
session_start();

// Check if admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    http_response_code(403);
    echo json_encode(['error' => 'Forbidden']);
    exit;
}

// Get JSON data
$input = json_decode(file_get_contents('php://input'), true);

// Read existing pins
$pinsFile = '../data/pins.json';
$pins = [];

if (file_exists($pinsFile)) {
    $pins = json_decode(file_get_contents($pinsFile), true);
}

// Remove pin
$pins = array_filter($pins, function($pin) use ($input) {
    return $pin['id'] != $input['id'];
});

// Re-index array
$pins = array_values($pins);

// Save to file
file_put_contents($pinsFile, json_encode($pins, JSON_PRETTY_PRINT));

echo json_encode(['success' => true]);
?>
