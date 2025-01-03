<?php  
if (!isset($_SESSION['username'])) {
        header('Location: ../login/login.php');
        exit();
    }
    include '../koneksi/koneksi.php';

    // Ambil data user yang sedang login
    $username = $_SESSION['username'];
    $sql = "SELECT ip_address, browser_info FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
        
    $ip_address = $data['ip_address'];
    $browser_info = $data['browser_info'];

    // Ganti IP ::1 dengan IPv4 127.0.0.1
    if ($ip_address == '::1') {
        $ip_address = '127.0.0.1';
    }

    $query = "SELECT * FROM siswa ORDER BY id_siswa ASC;";
    $sql = mysqli_query($conn, $query);
?>