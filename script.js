// Efek Pergantian Background
const heroBg = document.querySelector('.hero');
setInterval(() => {
    heroBg.style.backgroundImage = "url(img/bg-light.jpg)";
    setTimeout(() => {
        heroBg.style.backgroundImage = "url(img/bg.jpg)";
    }, 1000); // Pergantian kembali setelah 2 detik
}, 2200); // Pergantian setiap 4.4 detik

// Fungsi reusable untuk menampilkan dan menyembunyikan popup
const showPopup = (popupId) => {
    document.getElementById(popupId).style.display = 'flex';
};

const closePopup = (popupId) => {
    document.getElementById(popupId).style.display = 'none';
};

// Login Popup
const loginPopup = document.getElementById('loginPopup');
document.querySelector('.btn').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah form submit
    showPopup('loginPopup');
});

// Register Popup
const registerPopup = document.getElementById('registerPopup');
document.getElementById('registerAccount').addEventListener('click', function () {
    showPopup('registerPopup');
    closePopup('loginPopup'); // Menyembunyikan popup login
});

// Menutup Login Popup
document.getElementById('closeBtn').addEventListener('click', function() {
    closePopup('loginPopup');
});
document.getElementById('closeBtnRegister').addEventListener('click', function() {
    closePopup('registerPopup');
});

// Menutup Popup jika area di luar modal diklik
window.addEventListener('click', function(event) {
    if (event.target === loginPopup) {
        closePopup('loginPopup');
    }
    if (event.target === registerPopup) {
        closePopup('registerPopup');
    }
});

const registerForm = document.getElementById("registerForm");
if (registerForm) {
    registerForm.addEventListener("submit", function(event) {
        const password = document.getElementById("password2")?.value; // ID baru
        const confirmPassword = document.getElementById("confirmPassword")?.value;
        
		
		if (password.length < 8) {
            event.preventDefault();
            alert("Password Harus Memiliki Panjang Minimal 8 Karakter");
            return;
        }


        if (!password || !confirmPassword) {
            event.preventDefault(); // Mencegah pengiriman form jika ada kesalahan
            alert("Password Tidak Boleh Kosong");
            return;
        }

        if (password !== confirmPassword) {
            event.preventDefault(); // Mencegah pengiriman form jika ada kesalahan
            alert("Password Tidak Cocok");
            return;
        }
    });
}

// Logic untuk beralih ke form login
const loginAccountBtn = document.getElementById('loginAccount'); // Tombol untuk beralih ke login
loginAccountBtn.addEventListener('click', function (e) {
    e.preventDefault(); // Mencegah aksi default tombol
    showPopup('loginPopup');  // Menampilkan form login
    closePopup('registerPopup'); // Menyembunyikan form pendaftaran
});







