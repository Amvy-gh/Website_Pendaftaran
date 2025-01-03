<?php
include '../koneksi/koneksi.php';
include '../session/session.php';
include '../action/ubah.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../font_awesome/css/font-awesome.min.css">
    <title>UAS - Anjes Bermana</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style_edit_kelola.css">
</head>

<body>
    <div class="stars"></div>
    <nav class="navbar bg-body-tertiary bg-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Tambah dan Edit Data</a>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="../action/proses.php" enctype="multipart/form-data">
            <input type="hidden" name="id_siswa" value="<?php echo htmlspecialchars($id_siswa); ?>">
            <input type="hidden" name="aksi" value="<?php echo isset($_GET['ubah']) ? 'edit' : 'add'; ?>">

            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <input required type="text" name="nisn" class="form-control" id="nisn" placeholder="Ex : 123456" value="<?php echo htmlspecialchars($nisn); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                <div class="col-sm-10">
                    <input required type="text" name="nama_siswa" class="form-control" id="nama" placeholder="Ex : Andri" value="<?php echo htmlspecialchars($nama_siswa); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input required type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?php echo htmlspecialchars($tanggal_lahir); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <select required id="jkel" name="jenis_kelamin" class="form-select">
                        <option value="" disabled <?php echo empty($jenis_kelamin) ? "selected" : ""; ?>>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" <?php echo ($jenis_kelamin === 'Laki-laki') ? "selected" : ""; ?>>Laki-laki</option>
                        <option value="Perempuan" <?php echo ($jenis_kelamin === 'Perempuan') ? "selected" : ""; ?>>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-10">
                    <textarea required class="form-control" id="alamat" name="alamat" placeholder="Ex : Jl. Raya 123" rows="3"><?php echo htmlspecialchars($alamat); ?></textarea>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nilai_ujian" class="col-sm-2 col-form-label">Nilai Ujian</label>
                <div class="col-sm-10">
                    <input required type="number" name="nilai_ujian" class="form-control" id="nilai_ujian" placeholder="Ex : 90" value="<?php echo htmlspecialchars($nilai_ujian); ?>">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="status_siswa" class="col-sm-2 col-form-label">Status Siswa</label>
                <div class="col-sm-10">
                    <select id="status_siswa" name="status_siswa" class="form-select" required>
                        <option value="" disabled <?php echo empty($status_siswa) ? "selected" : ""; ?>>Pilih Status Siswa</option>
                        <option value="Aktif" <?php echo ($status_siswa === 'Aktif') ? "selected" : ""; ?>>Aktif</option>
                        <option value="Non-aktif" <?php echo ($status_siswa === 'Non-aktif') ? "selected" : ""; ?>>Non-aktif</option>
                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="foto" class="col-sm-2">Foto Siswa </br> | <cite> 2MB </label>
                <div class="col-sm-10">
                    <input type="file" name="foto" id="foto" class="form-control" <?php echo !isset($_GET['ubah']) ? 'required' : ''; ?>>
                </div>
            </div>

            <?php if (!empty($result['foto_siswa'])): ?>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Foto Saat Ini</label>
                    <div class="col-sm-10">
                        <img src="../img/<?php echo htmlspecialchars($result['foto_siswa']); ?>" alt="Foto Siswa" width="150" class="img-thumbnail">
                        <input type="hidden" name="foto_lama" value="<?php echo htmlspecialchars($result['foto_siswa']); ?>">
                    </div>
                </div>
            <?php endif; ?>

            <div class="mb-3 row mt-4">
                <div class="col">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-floppy-o"></i>
                        <?php echo isset($_GET['ubah']) ? 'Simpan Perubahan' : 'Tambahkan'; ?>
                    </button>
                    <a href="edit.php" class="btn btn-danger">
                        <i class="fa fa-reply"></i> Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
    <script src="../js/validateForm.js"></script>
    <script src="../js/localStorage.js"></script>
</body>
</html>
