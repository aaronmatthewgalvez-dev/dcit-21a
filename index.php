<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CvSU Campus Map - Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h1>CvSU Campus Map</h1>
            <p>Welcome! Please login to continue.</p>
            
            <form action="login.php" method="post">
                <h2>Administrator Login</h2>
                
                <?php if (isset($_GET['error'])): ?>
                    <p class="error">Invalid email or password!</p>
                <?php endif; ?>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit">Login as Admin</button>
            </form>
            
            <div class="guest-section">
                <p>Or</p>
                <a href="login.php?guest=true" class="guest-link">Continue as Guest</a>
            </div>
        </div>
    </div>
</body>
</html>
