<?php
session_start();

// Check if logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: index.php');
    exit;
}

$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CvSU Campus Map</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <h1>CvSU Campus Map</h1>
        <div class="user-info">
            <span class="role-badge"><?php echo ucfirst($role); ?></span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="main-content">
        <?php if ($role === 'admin'): ?>
        <div class="admin-controls">
            <h3>Admin Controls</h3>
            <button onclick="addPin()" class="btn">Add New Pin</button>
        </div>
        <?php endif; ?>

        <div class="map-container">
            <img src="images/campus_map.jpg" alt="Campus Map" id="campus-map">
            <div id="pins-container">
                <!-- Pins will be loaded here by JavaScript -->
            </div>
        </div>
    </div>

    <!-- Simple Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modal-title">Pin Details</h2>
            
            <div id="view-mode">
                <p id="pin-name"></p>
                <p id="pin-description"></p>
                <img id="pin-image" src="" alt="" style="max-width: 100%; margin: 10px 0; display: none;">
                <?php if ($role === 'admin'): ?>
                <button onclick="deletePin()" class="btn-delete">Delete Pin</button>
                <?php endif; ?>
            </div>
            
            <?php if ($role === 'admin'): ?>
            <div id="edit-mode" style="display: none;">
                <form id="pin-form" enctype="multipart/form-data">
                    <input type="hidden" id="pin-id">
                    <input type="hidden" id="pin-x">
                    <input type="hidden" id="pin-y">
                    
                    <label>Location Name:</label>
                    <input type="text" id="input-name" required>
                    
                    <label>Description:</label>
                    <textarea id="input-description" rows="4"></textarea>
                    
                    <label>Image:</label>
                    <input type="file" id="input-image" accept="image/*">
                    
                    <button type="submit" class="btn">Save Pin</button>
                    <button type="button" onclick="closeModal()" class="btn-cancel">Cancel</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        const USER_ROLE = '<?php echo $role; ?>';
    </script>
    <script src="js/map.js"></script>
</body>
</html>
