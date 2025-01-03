<?php
    // Fungsi untuk mendeteksi browser
    function getBrowser($userAgent) {
        $browsers = [
            'Edg' => 'Microsoft Edge',
            'Edge' => 'Microsoft Edge',
            'Chrome' => 'Google Chrome',
            'Firefox' => 'Mozilla Firefox',
            'Safari' => 'Safari',
        ];

        foreach ($browsers as $key => $browserName) {
            if (strpos($userAgent, $key) !== false) {
                return $browserName;
            }
        }

        return 'Browser Tidak Dikenali';
    }

    // Fungsi untuk mendapatkan IP Address
    function getUserIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ipArray = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($ipArray[0]);
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }

    if (isset($_SESSION['username'])) {
        header('Location: ../page/tampilan.php');
        exit();
    }

    if (isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);

            if ($password == $data['password']) {
                // Deteksi IP dan Browser
                $ip_address = getUserIp();
                $browser_info = getBrowser($_SERVER['HTTP_USER_AGENT']);

                // Simpan IP dan browser ke database
                $update_sql = "UPDATE users SET ip_address='$ip_address', browser_info='$browser_info' WHERE username='$username'";
                mysqli_query($conn, $update_sql);

                // Set session dan redirect
                $_SESSION['username'] = $data['username'];
                header('Location: ../page/tampilan.php');
                exit();
            } else {
                header('Location: login.php?error=Password salah!');
                exit();
            }
        } else {
            header('Location: login.php?error=Username tidak ditemukan!');
            exit();
        }
    }
?>