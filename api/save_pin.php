<?php
session_start();

// Check if admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    http_response_code(403);
    echo json_encode(['error' => 'Forbidden']);
    exit;
}

// Handle image upload if present
$imagePath = null;
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../images/pins/';
    $fileName = time() . '_' . basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        $imagePath = 'images/pins/' . $fileName;
    }
}

// Get form data
$id = $_POST['id'] ?? '';
$x = $_POST['x'] ?? '';
$y = $_POST['y'] ?? '';
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';

// Read existing pins
$pinsFile = '../data/pins.json';
$pins = [];

if (file_exists($pinsFile)) {
    $pins = json_decode(file_get_contents($pinsFile), true);
}

// Add or update pin
if (empty($id)) {
    // New pin
    $newId = count($pins) > 0 ? max(array_column($pins, 'id')) + 1 : 1;
    $pins[] = [
        'id' => $newId,
        'x' => floatval($x),
        'y' => floatval($y),
        'name' => $name,
        'description' => $description,
        'image' => $imagePath
    ];
} else {
    // Update existing pin
    foreach ($pins as &$pin) {
        if ($pin['id'] == $id) {
            $pin['name'] = $name;
            $pin['description'] = $description;
            if ($imagePath) {
                $pin['image'] = $imagePath;
            }
            break;
        }
    }
}

// Save to file
file_put_contents($pinsFile, json_encode($pins, JSON_PRETTY_PRINT));

echo json_encode(['success' => true]);
?>
