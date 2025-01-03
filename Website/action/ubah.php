<?php
    $id_siswa = '';
    $nisn = '';
    $nama_siswa = '';
    $jenis_kelamin = '';
    $alamat = '';
    $tanggal_lahir = '';
    $nilai_ujian = '';
    $status_siswa = '';

    if (isset($_GET['ubah'])) {
        $id_siswa = $_GET['ubah'];

        $query = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa'";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $nisn = $result['nisn'];
        $nama_siswa = $result['nama_siswa'];
        $jenis_kelamin = $result['jenis_kelamin'];
        $alamat = $result['alamat'];
        $tanggal_lahir = $result['tanggal_lahir'];
        $nilai_ujian = $result['nilai_ujian'];
        $status_siswa = $result['status_siswa'];
    }
?>