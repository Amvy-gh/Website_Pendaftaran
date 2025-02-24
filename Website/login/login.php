<?php
    include '../koneksi/koneksi.php';
    session_start();
    include '../function/detect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style_login.css">
    <link rel="stylesheet" href="../style/style_background.css">
    <script src="../js/style.js"></script>
</head>
<body>
    <!-- Video Background -->
    <video autoplay muted loop id="background-video">
        <source src="../video/bg_video.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

    <!-- Kontainer Form -->
    <div class="form-container">
        <form method="post">
            <h3>Login Here</h3>
            <?php
                if (isset($_GET['error'])) {
                    echo "<div class='error'>" . htmlspecialchars($_GET['error']) . "</div>";
                }
            ?>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <button type="submit" name="submit">Log In</button>
        </form>
    </div>
</body>
</html>
