# UAS Pemrograman Web

Proyek ini merupakan implementasi tugas akhir untuk UAS Pemrograman Web 2024/2025

```html
  Nama  : Anjes Bermana
  NIM   : 122140190
  Kelas : RB
```

Website ini dapat diakses melalui link berikut:

| **Detail**   | **Informasi**                                   |
|--------------|-------------------------------------------------|
| **Website**  | [https://anjes-uas.wuaze.com/](https://anjes-uas.wuaze.com/) |
| **Username** | `admin`                                         |
| **Password** | `admin`                                         |

---
### Catatan Penting

1. **Penggunaan Website**:  
   - Website ini hanya untuk keperluan Ujian Akhir Semester.  
   - Mohon tidak memasukkan data sensitif atau data yang tidak relevan.

2. **Manipulasi Data**:
   - Harap tidak memanipulasi data atau mencoba merusak fungsi website.  

4. **Keamanan**:  
   - Jangan bagikan username dan password kepada pihak lain tanpa izin.  
   - Gunakan dengan bijak sesuai panduan yang telah diberikan.

---

## Daftar Isi
- [Bagian 1: Client-side Programming](#bagian-1-client-side-programming)
- [Bagian 2: Server-side Programming](#bagian-2-server-side-programming)
- [Bagian 3: Database Management](#bagian-3-database-management)
- [Bagian 4: State Management](#bagian-4-state-management)
- [Bagian Bonus: Hosting Aplikasi Web](#bagian-bonus-hosting-aplikasi-web)

---

## Bagian 1: Client-side Programming

### 1.1 Manipulasi DOM dengan JavaScript
- Membuat form dengan minimal 4 elemen input (contoh: teks, checkbox, radio)
  
```html
<form method="POST" action="proses.php" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $id_siswa; ?>" name="id_siswa">
    <input type="hidden" name="aksi" value="<?php echo isset($_GET['ubah']) ? 'edit' : 'add'; ?>">

    <div class="mb-3 row">
        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
        <div class="col-sm-10">
            <input required type="text" name="nisn" class="form-control" id="nisn" placeholder="Ex : 123456" value="<?php echo $nisn; ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
        <div class="col-sm-10">
            <input required type="text" name="nama_siswa" class="form-control" id="nama" placeholder="Ex : Andri" value="<?php echo $nama_siswa; ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
            <input required type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-10">
            <select required id="jkel" name="jenis_kelamin" class="form-select">
                <option value="" disabled <?php if (empty($jenis_kelamin)) { echo "selected"; } ?>>Pilih Jenis Kelamin</option>
                <option <?php if ($jenis_kelamin == 'Laki-laki') { echo "selected"; } ?> value="Laki-laki">Laki-laki</option>
                <option <?php if ($jenis_kelamin == 'Perempuan') { echo "selected"; } ?> value="Perempuan">Perempuan</option>
            </select>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap</label>
        <div class="col-sm-10">
            <textarea required class="form-control" id="alamat" name="alamat" placeholder="Ex : Jl. Raya 123" rows="3"><?php echo $alamat; ?></textarea>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="nilai_ujian" class="col-sm-2 col-form-label">Nilai Ujian</label>
        <div class="col-sm-10">
            <input required type="number" name="nilai_ujian" class="form-control" id="nilai_ujian" placeholder="Ex : 90" value="<?php echo $nilai_ujian; ?>">
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
        <label for="foto" class="col-sm-2">Foto Siswa <br> (Max 2MB)</label>
        <div class="col-sm-10">
            <input type="file" name="foto" id="foto" class="form-control" <?php echo !isset($_GET['ubah']) ? 'required' : ''; ?>>
        </div>
    </div>
</form>
```

- Menampilkan data dari server dalam tabel HTML
  
```html
<table class="table align-middle table-bordered table-hover">
    <thead style="text-align:center">
        <tr>
            <th><center>No.</center></th>
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
            <td><img src="img/<?php echo $result['foto_siswa']; ?>" style="width:90px; height:135px"></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
```

### 1.2 Event Handling
- Terapkan minimal 3 event berbeda untuk menangani form
- Gunakan JavaScript untuk memvalidasi setiap input sebelum diproses oleh PHP

```javascript
function sanitizeInput(input) {
    const element = document.createElement('div');
    if (input) {
        element.innerText = input;
        return element.innerHTML;  
    }
    return input;
}

function validateForm(event) {
    const form = event.target;
    const nisn = sanitizeInput(form.nisn.value);
    const namaSiswa = sanitizeInput(form.nama_siswa.value);
    const tanggalLahir = form.tanggal_lahir.value;
    const jenisKelamin = form.jenis_kelamin.value;
    const alamat = sanitizeInput(form.alamat.value);
    const statusSiswa = form.status_siswa.value;
    const foto = form.foto.files[0];
    const nilaiUjian = sanitizeInput(form.nilai_ujian.value);
    const aksi = form.aksi.value;

    // Validate NISN
    if (nisn.length !== 10 || isNaN(nisn)) {
        alert("NISN harus terdiri dari 10 digit angka");
        event.preventDefault();
        return false;
    }

    // Validate Nama Siswa
    if (!/^[A-Za-z\s]+$/.test(namaSiswa)) {
        alert("Nama Siswa hanya boleh mengandung huruf dan spasi!");
        event.preventDefault();
        return false;
    }

    // Validate Tanggal Lahir (Usia Siswa Antara 15 dan 21 Tahun)
    const today = new Date();
    const birthDate = new Date(tanggalLahir);
    let age = today.getFullYear() - birthDate.getFullYear();
    const m = today.getMonth() - birthDate.getMonth();

    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    if (age <= 15 || age >= 21) {
        alert("Tanggal Lahir harus membuat usia siswa antara 15 dan 21 tahun!");
        event.preventDefault();
        return false;
    }

    // Validate Jenis Kelamin
    if (jenisKelamin === "") {
        alert("Jenis Kelamin harus dipilih!");
        event.preventDefault();
        return false;
    }

    // Validate Alamat Lengkap
    if (alamat === "") {
        alert("Alamat Lengkap harus diisi!");
        event.preventDefault();
        return false;
    }

    // Validate Nilai Ujian
    if (nilaiUjian === "" || isNaN(nilaiUjian) || nilaiUjian < 0 || nilaiUjian > 100) {
        alert("Nilai Ujian harus diisi dengan angka antara 0 dan 100!");
        event.preventDefault();
        return false;
    }

    // Validate Status Siswa
    if (statusSiswa === "") {
        alert("Status Siswa harus dipilih!");
        event.preventDefault();
        return false;
    }

    if (aksi === "add" && !foto) {
        alert("Foto Siswa harus diunggah!");
        event.preventDefault();
        return false;
    } else if (foto) {
        // Jika foto diupload, validasi tipe dan ukuran file
        const fileType = foto.type;
        if (fileType !== 'image/jpeg' && fileType !== 'image/png') {
            alert("Hanya file JPG atau PNG yang diperbolehkan!");
            event.preventDefault();
            return false;
        }

        const fileSize = foto.size;
        if (fileSize > 2 * 1024 * 1024) {
            alert("Ukuran file harus kurang dari 2MB!");
            event.preventDefault();
            return false;
        }
    }
    return true;
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('form').addEventListener('submit', validateForm);
});
```

## Bagian 2: Server-side Programming

### 2.1 Pengelolaan Data dengan PHP
- Menggunakan metode POST dan GET pada formulir
- Parsing data dari variabel global dan lakukan validasi di sisi server

```php
if (isset($_POST['aksi'])) {
    // Ambil data dari form
    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $nilai_ujian = $_POST['nilai_ujian'];
    $status_siswa = $_POST['status_siswa'];

    // Validasi NISN
    if (!$siswaObj->validasiNISN($nisn)) {
        echo "NISN harus terdiri dari 10 digit angka.";
        exit();
    }

    // Validasi Tanggal Lahir
    if (!$siswaObj->validasiTanggalLahir($tanggal_lahir)) {
        echo "Format tanggal lahir salah, harap gunakan format yang benar (YYYY-MM-DD).";
        exit();
    }

    // Validasi Usia
    if ($siswaObj->hitungUsia($tanggal_lahir) <= 15 || $siswaObj->hitungUsia($tanggal_lahir) >= 21) {
        echo "Usia harus antara 15 dan 21 tahun.";
        exit();
    }

    // Validasi Nilai Ujian
    if (!$siswaObj->validasiNilaiUjian($nilai_ujian)) {
        echo "Nilai ujian harus berupa angka antara 0 dan 100.";
        exit();
    }

    // Validasi Foto
    if (isset($_FILES['foto']) && !empty($_FILES['foto']['name']) && !$siswaObj->validasiFoto($_FILES['foto'])) {
        echo "File yang diunggah bukan gambar yang valid (hanya .jpg, .png, .gif yang diterima) atau ukuran file terlalu besar.";
        exit();
    }

    $foto = isset($_FILES['foto']) ? $siswaObj->uploadFoto($_FILES['foto']) : "";

    if ($_POST['aksi'] == "add") {
        // Validasi NISN untuk tidak ada duplikasi
        $query_check_nisn = "SELECT COUNT(*) FROM siswa WHERE nisn = '$nisn'";
        $result_check_nisn = mysqli_query($conn, $query_check_nisn);
        $count = mysqli_fetch_row($result_check_nisn)[0];
    
        if ($count > 0) {
            echo "<script>
                    alert('NISN sudah ada dalam sistem!');
                    window.history.back();
                    </script>";
            exit();
        }
    
        if ($siswaObj->tambahDataSiswa($nisn, $nama_siswa, $tanggal_lahir, $jenis_kelamin, $foto, $alamat, $nilai_ujian, $status_siswa)) {
            header("location: ../page/edit.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } 
    
    // Aksi edit data
    else if ($_POST['aksi'] == "edit") {
        $id_siswa = $_POST['id_siswa'];
    
        // Validasi NISN untuk memastikan tidak ada duplikasi
        $query_check_nisn = "SELECT COUNT(*) FROM siswa WHERE nisn = '$nisn' AND id_siswa != '$id_siswa'";
        $result_check_nisn = mysqli_query($conn, $query_check_nisn);
        $count = mysqli_fetch_row($result_check_nisn)[0];
    
        if ($count > 0) {
            echo "<script>
                    alert('NISN sudah ada dalam sistem!');
                    window.history.back();
                    </script>";
            exit();
        }
    
        if (!empty($_FILES['foto']['name'])) {
            $foto = $siswaObj->uploadFoto($_FILES['foto']);
        } else {
            $foto = $_POST['foto_lama'];
        }
    
        if ($siswaObj->updateDataSiswa($id_siswa, $nisn, $nama_siswa, $tanggal_lahir, $jenis_kelamin, $foto, $alamat, $nilai_ujian, $status_siswa)) {
            header("location: ../page/edit.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

if (isset($_GET['hapus'])) {
    $id_siswa = $_GET['hapus'];
    if ($siswaObj->hapusDataSiswa($id_siswa)) {
        header("location: ../page/edit.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
```

- Menyimpan data ke basis data, termasuk data jenis browser dan alamat IP pengguna

```php
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

```

### 2.2 Objek PHP Berbasis OOP

- Buat sebuah objek PHP berbasis OOP yang memiliki minimal dua metode dan gunakan objek tersebut

```php
// Metode untuk menambah data siswa
public function tambahDataSiswa($nisn, $nama_siswa, $tanggal_lahir, $jenis_kelamin, $foto, $alamat, $nilai_ujian, $status_siswa) {
    $query = "INSERT INTO siswa (nisn, nama_siswa, tanggal_lahir, jenis_kelamin, foto_siswa, alamat, nilai_ujian, status_siswa) 
            VALUES ('$nisn', '$nama_siswa', '$tanggal_lahir', '$jenis_kelamin', '$foto', '$alamat', '$nilai_ujian', '$status_siswa')";
    return mysqli_query($this->conn, $query);
}

// Metode untuk memperbarui data siswa
public function updateDataSiswa($id_siswa, $nisn, $nama_siswa, $tanggal_lahir, $jenis_kelamin, $foto, $alamat, $nilai_ujian, $status_siswa) {
    $query = "UPDATE siswa 
            SET nisn = '$nisn', nama_siswa = '$nama_siswa', tanggal_lahir = '$tanggal_lahir', 
                jenis_kelamin = '$jenis_kelamin', foto_siswa = '$foto', alamat = '$alamat', 
                nilai_ujian = '$nilai_ujian', status_siswa = '$status_siswa' 
            WHERE id_siswa = '$id_siswa'";
    return mysqli_query($this->conn, $query);
}

// Metode untuk menghapus siswa
public function hapusDataSiswa($id_siswa) {
    $queryShow = "SELECT * FROM siswa WHERE id_siswa = '$id_siswa';";
    $sqlShow = mysqli_query($this->conn, $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);
    unlink("../img/" . $result['foto_siswa']);

    $query = "DELETE FROM siswa WHERE id_siswa = '$id_siswa';";
    return mysqli_query($this->conn, $query);
}
```

## Bagian 3: Database Management

### 3.1 Pembuatan Tabel Database

```sql
CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `foto_siswa` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nilai_ujian` int(11) DEFAULT NULL,
  `status_siswa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `browser_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

### 3.2 Konfigurasi Koneksi Database

```php
<?php
    class Koneksi {
        private $host;
        private $user;
        private $pass;
        private $db;
        private $conn;

        public function __construct($host, $user, $pass, $db) {
            $this->host = $host;
            $this->user = $user;
            $this->pass = $pass;
            $this->db = $db;
            $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
            if (!$this->conn) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }
        }

        public function getConn() {
            return $this->conn;
        }
}

$koneksi = new Koneksi('localhost', 'root', '', 'db_sekolah');
$conn = $koneksi->getConn();
?>
```

### 3.3 Manipulasi Data pada Database

```php
if (isset($_POST['aksi'])) {
    // Ambil data dari form
    $nisn = $_POST['nisn'];
    $nama_siswa = $_POST['nama_siswa'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $nilai_ujian = $_POST['nilai_ujian'];
    $status_siswa = $_POST['status_siswa'];

    // Aksi edit data
    else if ($_POST['aksi'] == "edit") {
        $id_siswa = $_POST['id_siswa'];
    
        if (!empty($_FILES['foto']['name'])) {
            $foto = $siswaObj->uploadFoto($_FILES['foto']);
        } else {
            $foto = $_POST['foto_lama'];
        }
    
        if ($siswaObj->updateDataSiswa($id_siswa, $nisn, $nama_siswa, $tanggal_lahir, $jenis_kelamin, $foto, $alamat, $nilai_ujian, $status_siswa)) {
            header("location: edit.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

if (isset($_GET['hapus'])) {
    $id_siswa = $_GET['hapus'];
    if ($siswaObj->hapusDataSiswa($id_siswa)) {
        header("location: edit.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
```

## Bagian 4: State Management

### 4.1 State Management dengan Session
- Menggunakan session_start pada tampilan.php edit.php dan kelola.php dengan include 'koneksi/koneksi.php' dan include 'session/session.php';

```php
<?php
    session_start();

    // Cek apakah user sudah login
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit();
    }
?>
```

### 4.2 Pengelolaan State dengan Cookie dan Browser Storage
- Menetapkan Cookie untuk menyimpan tema yang digunakan oleh user sehingga ketika direfresh ataupun logout dari website maka tema yang sebelumnya dipakai akan tetap sama selama 3 hari

```javascript
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        const date = new Date();
        // Mengatur masa berlaku cookie
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Fungsi untuk mendapatkan cookie
function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i].trim();
        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Fungsi untuk mengubah tema
function toggleTheme() {
    const body = document.body;
    const isDark = body.getAttribute('data-theme') === 'dark';
    body.setAttribute('data-theme', isDark ? 'light' : 'dark');
    setCookie("theme", isDark ? 'light' : 'dark', 3);
}

window.onload = function() {
    const theme = getCookie("theme") || 'light';
    document.body.setAttribute('data-theme', theme);
}

// Fungsi untuk menampilkan atau menyembunyikan informasi IP dan Browser
function toggleIPBrowserInfo() {
    var infoDiv = document.getElementById("ipBrowserInfo");
    // Cek apakah elemen sedang ditampilkan
    if (infoDiv.style.display === "none" || infoDiv.style.display === "") {
        infoDiv.style.display = "block";
    } else {
        infoDiv.style.display = "none";
    }
}
```
- Local Storage digunakan untuk menyimpan data sementara saat user menambahkannya, sehingga data tetap ada meskipun halaman di-refresh atau logout, dan terhapus saat submit

```javascript
// Local Storage
function saveToLocalStorage() {
    const aksi = document.querySelector('input[name="aksi"]').value;
    if (aksi === 'add') {
        const nisn = document.getElementById('nisn').value;
        const nama = document.getElementById('nama').value;
        const tanggalLahir = document.getElementById('tanggal_lahir').value;
        const jenisKelamin = document.getElementById('jkel').value;
        const alamat = document.getElementById('alamat').value;
        const nilaiUjian = document.getElementById('nilai_ujian').value;
        const statusSiswa = document.getElementById('status_siswa').value;

        const formData = {
            nisn: nisn,
            nama_siswa: nama,
            tanggal_lahir: tanggalLahir,
            jenis_kelamin: jenisKelamin,
            alamat: alamat,
            nilai_ujian: nilaiUjian,
            status_siswa: statusSiswa,
            timestamp: new Date().getTime()
        };

        // Simpan ke localStorage
        localStorage.setItem('formData', JSON.stringify(formData));
    }
}

// Fungsi untuk mengisi form dari localStorage jika data belum kedaluwarsa
function populateFormFromLocalStorage() {
    const aksi = document.querySelector('input[name="aksi"]').value;
    if (aksi === 'add') {
        const storedData = localStorage.getItem('formData');
        if (storedData) {
            const formData = JSON.parse(storedData);
            const currentTime = new Date().getTime();
            const expiryTime = 3 * 24 * 60 * 60 * 1000;

            // Mengecek apakah data sudah kedaluwarsa (lebih dari 3 hari)
            if (currentTime - formData.timestamp > expiryTime) {
                localStorage.removeItem('formData'); 
                return;
            }

            // Mengisi form jika data belum kedaluwarsa
            document.getElementById('nisn').value = formData.nisn;
            document.getElementById('nama').value = formData.nama_siswa;
            document.getElementById('tanggal_lahir').value = formData.tanggal_lahir;
            document.getElementById('jkel').value = formData.jenis_kelamin;
            document.getElementById('alamat').value = formData.alamat;
            document.getElementById('nilai_ujian').value = formData.nilai_ujian;
            document.getElementById('status_siswa').value = formData.status_siswa;
        }
    }
}

// Fungsi untuk menghapus data dari localStorage setelah form disubmit
function clearLocalStorage() {
    const aksi = document.querySelector('input[name="aksi"]').value;
    if (aksi === 'add') {
        localStorage.removeItem('formData');
    }
}

// Pastikan data ditampilkan saat halaman dimuat
window.onload = function() {
    populateFormFromLocalStorage();
}

const form = document.querySelector('form');
form.addEventListener('input', saveToLocalStorage);

// Hapus localStorage setelah submit
form.addEventListener('submit', clearLocalStorage);
```

## Bagian Bonus: Hosting Aplikasi Web

### 1. Langkah-Langkah Meng-Host Aplikasi Web

#### Registrasi Akun
1. Daftar akun di platform hosting gratis [InfinityFree](https://infinityfree.com)
2. Verifikasi akun melalui email yang telah didaftarkan
3. Pilih paket hosting gratis yang tersedia untuk memulai

#### Persiapan File
- Pastikan semua file aplikasi web telah dipersiapkan dan tidak mengandung error
- Periksa kembali struktur folder agar sesuai standar hosting, taruh dalam htdocs

#### Upload dan Konfigurasi
1. Login ke control panel InfinityFree
2. Upload file dan folder aplikasi ke direktori htdocs
3. Buat dan konfigurasi database MySQL

### 2. Pemilihan Penyedia Hosting
#### Mengapa Memilih InfinityFree?
- Gratis dengan bandwidth tanpa batas
- Mendukung PHP dan MySQL
- Antarmuka yang mudah digunakan

### 3. Keamanan Aplikasi Web
- Validasi input pada sisi antarmuka (front-end) dan sisi server (back-end)
- Menggukan HTTPS menggunakan SSL Certificate yang disediakan gratis
- Direct HTTP ke HTTPS menggunakan .htaccess
- Perbaharui SSL Certificate setiap 3 bulan sekali

### 4. Konfigurasi Server
- Menaruh database dengan ketentuan yang telah diterapkan penyedia hosting 

```php
$servername = "sql305.infinityfree.com";
$username = "[Username ditetapkan dari websitenya]";
$password = "[Password ditetapkan dari websitenya]";
$database = "if0_37973435_db_sekolah";
```
