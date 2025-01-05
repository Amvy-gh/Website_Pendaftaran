// Fungsi untuk menyimpan data dengan tanggal kedaluwarsa
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