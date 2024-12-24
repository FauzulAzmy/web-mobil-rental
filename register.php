<?php
session_start();
require 'db.php'; // Pastikan file koneksi database Anda benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form dengan validasi sederhana
    $name = trim($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = preg_replace('/[^0-9]/', '', $_POST['phone']);
    $password = $_POST['password2'];


    // Validasi apakah name atau email sudah ada di database
    $checkQuery = "SELECT * FROM pendaftar WHERE name = ? OR email = ?";
    $stmt = $conn->prepare($checkQuery);
    if (!$stmt) {
        echo '<script>alert("Query error: ' . $conn->error . '");</script>';
        exit;
    }
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika name atau email sudah ada
        echo '<script>alert("Nama atau Email telah terdaftar."); window.location.href = "index.php";</script>';
    } else {
        // Jika validasi berhasil, simpan data ke database
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $insertQuery = "INSERT INTO pendaftar (name, email, phone, password, created_at) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($insertQuery);

        if (!$stmt) {
            echo '<script>alert("Query error: ' . $conn->error . '");</script>';
            exit;
        }
        $stmt->bind_param("ssss", $name, $email, $phone, $hashedPassword);

        if ($stmt->execute()) {
            // Jika registrasi berhasil
            echo '<script>alert("Registrasi berhasil! Silakan login."); window.location.href = "index.php";</script>';
        } else {
            echo '<script>alert("Pendaftaran gagal: ' . $conn->error . '"); window.location.href = "index.php";</script>';
        }
    }

    $stmt->close();
    $conn->close();
}
?>
