// Fungsi untuk menetapkan cookie
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