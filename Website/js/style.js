document.addEventListener("DOMContentLoaded", () => {
    function createStars() {
        const stars = document.getElementById('stars');
        const count = 200;

        for (let i = 0; i < count; i++) {
            const star = document.createElement('div');
            star.classList.add('star');
            star.style.left = `${Math.random() * 100}%`;  // Posisi acak pada sumbu X
            star.style.top = `${Math.random() * 100}%`;   // Mulai di posisi acak pada sumbu Y

            // Durasi animasi naik dan turun acak antara 6 detik hingga 10 detik
            star.style.animationDuration = `${Math.random() * 4 + 6}s`;

            // Menambahkan bintang ke dalam kontainer
            stars.appendChild(star);
        }
    }

    createStars();
});
