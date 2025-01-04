<?php
    session_start();
    include '../function/get.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tampilan Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../font_awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style/style_tampilan.css">
    <link rel="stylesheet" href="../style/style_background.css">
    <script src="../js/theme_and_info.js"></script>
</head>

<body>
    <video autoplay muted loop id="background-video">
        <source src="../video/bg_video.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>
    <nav class="navbar bg-body-tertiary bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tampilan data</a>
        </div>
    </nav>
    <div class="container">
        <h1 class="mt-4">Data Siswa SMA Komputer Indonesia</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Tampilan data</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                UAS Pemrograman Web | Anjes Bermana</cite>
            </figcaption>
        </figure>

        <button type="button" class="btn btn-info mb-3" onclick="toggleIPBrowserInfo()">
            <i class="fa fa-info-circle text-white"></i> 
            <span class="text-white">
                Tampilkan Informasi IP dan Browser
            </span>
        </button>

        <div id="ipBrowserInfo" class="card shadow-sm p-3 mb-3 bg-white rounded" style="display:none;">
            <h5 class="card-title">Informasi Login Anda</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Alamat IP : </strong><?php echo $ip_address; ?></li>
                <li class="list-group-item"><strong>Browser   : </strong><?php echo $browser_info; ?></li>
            </ul>
        </div>

        <button type="button" class="btn btn-secondary mb-3" onclick="toggleTheme()">
            <i class="fa fa-refresh"></i> 
            Ganti Tema
        </button>

        <a href="edit.php" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-pencil"></i>
            Edit Data
        </a>
        <a href="../login/logout.php" type="button" class="btn btn-danger mb-3">
            <i class="fa fa-sign-out"></i>
            Logout
        </a>
        
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
                <thead style="text-align:center">
                    <tr>
                        <th><center>No</center></th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat Lengkap</th>
                        <th>Nilai Ujian</th>
                        <th>Status Siswa</th>
                        <th>Foto Siswa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($result = mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr style="text-align:center">
                        <td><center><?php echo $no++; ?></center></td>
                        <td><?php echo $result['nisn']; ?></td>
                        <td><?php echo $result['nama_siswa']; ?></td>
                        <td><?php echo $result['tanggal_lahir']; ?></td>
                        <td><?php echo $result['jenis_kelamin']; ?></td>
                        <td><?php echo $result['alamat']; ?></td>
                        <td><?php echo $result['nilai_ujian']; ?></td>
                        <td><?php echo $result['status_siswa']; ?></td>
                        <td><img src="../img/<?php echo $result['foto_siswa']; ?>" style="width:90px; height:135px"></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>