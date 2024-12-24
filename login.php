<?php
session_start();
require 'db.php'; // Pastikan file koneksi database Anda ada

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['username'];
    $password = $_POST['password'];

    // Ambil data pengguna dari database
    $stmt = $conn->prepare("SELECT id, name, password FROM pendaftar WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan data di session
            $_SESSION['name'] = $user['name'];
            $_SESSION['user_id'] = $user['id'];

            // Redirect berdasarkan user
            if ($user['name'] === 'admin') {
                // Sesuaikan path dengan lokasi file Anda
                header("Location: /Rental Login Page/crud project/index.php");
            } else {
                header("Location: /Rental Login Page/Landing Page/landingpage.php");
            }
            exit;
        } else {
            // Tampilkan alert jika password salah
            echo "<script>alert('Password salah!'); window.location.href = 'index.php';</script>";
        }
    } else {
        // Tampilkan alert jika nama tidak ditemukan
        echo "<script>alert('Nama tidak ditemukan!'); window.location.href = 'index.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
