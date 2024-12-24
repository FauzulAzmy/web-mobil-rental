<?php
// Memeriksa apakah parameter 'id' ada di URL
if (isset($_GET['id'])) {
    // Mengambil nilai id dari URL
    $id = $_GET['id'];

    // Membuat koneksi ke database
    $conn = new mysqli("localhost", "root", "", "crud_db");

    // Mengecek apakah koneksi berhasil
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Menyusun query untuk menghapus data berdasarkan id
    $sql = "DELETE FROM pendaftar WHERE id=$id";

    // Mengeksekusi query dan mengecek apakah berhasil
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); // Redirect ke halaman utama jika berhasil
        exit(); // Menghentikan eksekusi kode setelah redirect
    } else {
        echo "Error: " . $conn->error; // Menampilkan pesan kesalahan jika gagal
    }

    // Menutup koneksi
    $conn->close();
}
?>
